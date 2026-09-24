@if ($programs->isEmpty())
  <div class="kosong">Belum ada program terjadwal di bidang ini. Cek lagi nanti, atau buka kalender penuh untuk bidang lain.</div>
@elseif ($grid ?? false)
  <div class="progrid">
    @foreach ($programs as $p)
      <article><span class="blob" aria-hidden="true"><svg><use href="{{ asset('img/ikon.svg') }}#i{{ ($loop->index % 6) + 1 }}"/></svg></span>
        <div><p class="tgl">{{ $p->mulai->translatedFormat('j M Y') }}</p><h3>{{ $p->judul }}</h3><span class="bd">{{ $p->bidang->nama }}@if ($p->is_contoh), data dummy @endif</span></div></article>
    @endforeach
  </div>
@else
  @foreach ($programs->groupBy(fn ($p) => $p->mulai->translatedFormat('F Y')) as $bulan => $daftar)
  <div class="grup"><h3 class="bulan">{{ $bulan }}</h3>
    <ol class="jalur">
      @foreach ($daftar as $p)
        <li>
          <p class="tgl">{{ $p->mulai->translatedFormat('j F Y') }}@if ($p->selesai) sampai {{ $p->selesai->translatedFormat('j F Y') }}@endif</p>
          <h3>{{ $p->judul }}</h3>
          <span class="bd">{{ $p->bidang->nama }}@if ($p->is_contoh), data dummy @endif</span>
        </li>
      @endforeach
    </ol></div>
  @endforeach
@endif
