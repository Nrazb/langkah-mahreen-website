@forelse ($programs->groupBy(fn ($p) => $p->mulai->translatedFormat('F Y')) as $bulan => $daftar)
  <h3 class="bulan">{{ $bulan }}</h3>
  <ol class="jalur">
    @foreach ($daftar as $p)
      <li>
        <p class="tgl">{{ $p->mulai->translatedFormat('j F') }}@if ($p->selesai) sampai {{ $p->selesai->translatedFormat('j F') }}@endif</p>
        <h3>{{ $p->judul }}</h3>
        <span class="bd">{{ $p->bidang->nama }}@if ($p->is_contoh), data dummy @endif</span>
        @if ($p->keterangan)<p>{{ $p->keterangan }}</p>@endif
      </li>
    @endforeach
  </ol>
@empty
  <div class="kosong">Belum ada program terjadwal di bidang ini. Cek lagi nanti, atau buka kalender penuh untuk bidang lain.</div>
@endforelse
