<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Pilihan;
use App\Models\Program;
use App\Models\Simpul;
use Illuminate\Database\Seeder;

// Semua isi di sini adalah data contoh. Ganti dengan data asli Mahreen.
class JalurSeeder extends Seeder
{
    public function run(): void
    {
        $bidang = [
            'digital' => ['Kreativitas & Teknologi Digital', 'Membuat karya dan alat lewat layar: desain, kode, media.', 'Kamu memilih jalan yang berujung pada karya yang bisa dilihat banyak orang dan dibuat dengan alat digital.'],
            'lingkungan' => ['Lingkungan & Keberlanjutan', 'Bekerja langsung dengan tanah, air, dan kebiasaan sehari-hari.', 'Kamu mulai dari mengamati dan turun ke lapangan, dua kebiasaan yang jadi dasar kerja lingkungan.'],
            'komunitas' => ['Komunitas & Sosial', 'Menggerakkan orang di sekitar untuk urusan bersama.', 'Kamu ingin hasil kerjamu sampai ke orang-orang di sekitarmu, dan itu inti kerja komunitas.'],
            'budaya' => ['Literasi & Budaya', 'Menulis, membaca, dan merawat cerita yang dipakai bersama.', 'Kamu memilih cerita dan tulisan sebagai bahasa utama, dan itu yang dirawat di jalur ini.'],
        ];
        foreach ($bidang as $slug => [$nama, $ringkas, $alasan]) {
            Bidang::create(compact('slug', 'nama', 'ringkas', 'alasan'));
        }

        Simpul::insert([
            ['id' => 1, 'is_start' => true, 'teks' => 'Sebuah ide muncul di kepalamu. Kamu lebih suka menuangkannya lewat gambar, kode, atau tulisan?'],
            ['id' => 2, 'is_start' => false, 'teks' => 'Gambarmu selesai. Siapa yang ingin kamu tunjukkan lebih dulu?'],
            ['id' => 3, 'is_start' => false, 'teks' => 'Kodemu berjalan. Ada masalah nyata di sekitarmu. Kamu mulai dari mana?'],
            ['id' => 4, 'is_start' => false, 'teks' => 'Tulisanmu selesai. Di mana kamu ingin ia hidup?'],
        ]);

        $pilihan = [
            [1, 'Lewat gambar', 2, ['digital' => 1]],
            [1, 'Lewat kode', 3, ['digital' => 2]],
            [1, 'Lewat tulisan dan cerita', 4, ['budaya' => 1]],
            [2, 'Orang-orang di layar, dari mana saja', null, ['digital' => 2]],
            [2, 'Tetangga dan teman, di ruang nyata', null, ['komunitas' => 2, 'budaya' => 1]],
            [3, 'Membuat aplikasi kecil untuk itu', null, ['digital' => 2]],
            [3, 'Turun ke lapangan dan mengamati dulu', null, ['lingkungan' => 2, 'komunitas' => 1]],
            [4, 'Di podcast atau media daring', null, ['digital' => 1, 'budaya' => 2]],
            [4, 'Di forum warga dan ruang baca', null, ['budaya' => 1, 'komunitas' => 2]],
        ];
        foreach ($pilihan as [$s, $label, $next, $skor]) {
            Pilihan::create(['simpul_id' => $s, 'label' => $label, 'next_simpul_id' => $next, 'skor' => $skor]);
        }

        $program = [
            ['digital', 'Lokakarya ilustrasi digital', '2026-10-17', '2026-10-18'],
            ['digital', 'Kelas dasar pemrograman web', '2026-11-07', '2026-12-05'],
            ['digital', 'Pameran karya media baru', '2027-01-23', null],
            ['lingkungan', 'Aksi pengamatan sungai', '2026-10-24', null],
            ['lingkungan', 'Pelatihan kebun komunitas', '2026-12-12', '2026-12-13'],
            ['komunitas', 'Temu relawan muda', '2026-11-14', null],
            ['komunitas', 'Perancangan acara warga', '2027-01-09', '2027-01-10'],
            ['budaya', 'Kelas menulis cerita pendek', '2026-11-21', '2026-12-19'],
            ['budaya', 'Malam baca bersama', '2027-02-06', null],
        ];
        foreach ($program as [$slug, $judul, $mulai, $selesai]) {
            Program::create([
                'bidang_id' => Bidang::where('slug', $slug)->value('id'),
                'judul' => $judul, 'mulai' => $mulai, 'selesai' => $selesai, 'is_contoh' => true,
            ]);
        }
    }
}
