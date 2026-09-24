<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Program;
use App\Models\Simpul;
use Illuminate\Http\Request;

class JalurController extends Controller
{
    public function beranda()
    {
        return view('beranda', ['bidang' => Bidang::orderBy('id')->get(), 'jmlProgram' => Program::count(), 'jmlTanya' => Simpul::count()]);
    }

    public function langkah(Request $r)
    {
        if (! Simpul::where('is_start', true)->exists()) {
            return view('langkah', ['kosong' => true]);
        }
        $ids = $this->jalur($r);
        $t = $this->telusuri($ids);
        if (! $t) {
            return redirect()->route('langkah')->with('galat', 'Jalur di alamat itu tidak dikenali, jadi kita mulai dari awal.');
        }
        if (! $t['simpul']) {
            return redirect()->route('hasil', ['p' => implode(',', $ids)]);
        }

        return view('langkah', ['kosong' => false, 'simpul' => $t['simpul'], 'ids' => $ids, 'total' => $this->kedalaman(Simpul::where('is_start', true)->value('id'))]);
    }

    public function hasil(Request $r)
    {
        $ids = $this->jalur($r);
        $t = $this->telusuri($ids);
        if (! $t || $t['simpul']) {
            return redirect()->route('langkah', $t ? ['p' => implode(',', $ids)] : []);
        }

        $skor = [];
        foreach ($t['dipilih'] as $p) {
            foreach ($p->skor ?? [] as $slug => $n) {
                $skor[$slug] = ($skor[$slug] ?? 0) + $n;
            }
        }
        arsort($skor);
        $slugs = array_keys($skor);
        $pilih = array_slice($slugs, 0, 1);
        // Jalur kedua hanya tampil kalau skornya selisih satu poin atau kurang dari yang pertama.
        if (isset($slugs[1]) && $skor[$slugs[1]] > 0 && $skor[$slugs[1]] >= $skor[$slugs[0]] - 1) {
            $pilih[] = $slugs[1];
        }

        $bidang = Bidang::whereIn('slug', $pilih)->get()->sortBy(fn ($b) => array_search($b->slug, $pilih))->values();
        $programs = Program::with('bidang')->whereIn('bidang_id', $bidang->pluck('id'))->orderBy('mulai')->get();

        return view('hasil', compact('bidang', 'programs', 'ids'));
    }

    public function kalender(Request $r)
    {
        $slug = $r->query('bidang');
        $semua = Bidang::orderBy('nama')->get();
        $programs = Program::with('bidang')
            ->when($slug, fn ($q) => $q->whereHas('bidang', fn ($b) => $b->where('slug', $slug)))
            ->orderBy('mulai')->get();

        return view('kalender', compact('semua', 'programs', 'slug'));
    }

    private function kedalaman(int $id, int $batas = 0): int
    {
        $s = Simpul::with('pilihan')->find($id);
        if (! $s || $batas > 10) {
            return 0;
        }

        return 1 + $s->pilihan->map(fn ($p) => $p->next_simpul_id ? $this->kedalaman($p->next_simpul_id, $batas + 1) : 0)->max();
    }

    private function jalur(Request $r): array
    {
        return array_values(array_filter(array_map('intval', explode(',', (string) $r->query('p')))));
    }

    // Jalan dari simpul awal mengikuti pilihan. Null bila ada id yang tidak sah; 'simpul' null bila alur sudah selesai.
    private function telusuri(array $ids): ?array
    {
        $simpul = Simpul::with('pilihan')->where('is_start', true)->first();
        if (! $simpul) {
            return null;
        }
        $dipilih = collect();
        foreach ($ids as $id) {
            $p = $simpul->pilihan->firstWhere('id', $id);
            if (! $p) {
                return null;
            }
            $dipilih->push($p);
            if (! $p->next_simpul_id) {
                return ['simpul' => null, 'dipilih' => $dipilih];
            }
            $simpul = Simpul::with('pilihan')->find($p->next_simpul_id);
            if (! $simpul) {
                return null;
            }
        }

        return ['simpul' => $simpul, 'dipilih' => $dipilih];
    }
}
