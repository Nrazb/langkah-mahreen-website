@extends('layout')
@section('isi')
<section class="hero">
  <div>
    <p class="kicker">EKOSISTEM UNTUK GENERASI MUDA</p>
    <h1>Berkarya<br>Untuk <em>Indonesia</em></h1>
    <p class="lead">Temukan ruangmu, kembangkan ide, dan jadi bagian dari ekosistem Mahreen Indonesia di bidang kreativitas, teknologi, talenta, bisnis, komunitas, dan kontribusi sosial.</p>
    <a class="btn" href="{{ route('langkah') }}">Mulai Jelajahi <span aria-hidden="true">→</span></a>
  </div>
  <div class="kolase"><img src="{{ asset('img/hero.svg') }}" alt="Ilustrasi mahasiswi membawa buku di depan Monas dan bendera merah putih"><span class="pita">Generasi muda<br>untuk Indonesia</span><span class="tulis t1">Ide<br>Kolaborasi<br>Aksi</span></div>
</section>
<section aria-labelledby="jj">
  <div class="judulbaris"><div><h2 class="judul" id="jj">Jelajahi Jalurmu</h2><p class="sub">Temukan bidang yang paling dekat dengan minat dan potensimu.</p></div></div>
  <ul class="kartu">
    @forelse ($bidang as $b)
      <li><a href="{{ route('kalender', ['bidang' => $b->slug]) }}">
        <span class="blob" aria-hidden="true"><svg><use href="{{ asset('img/ikon.svg') }}#i{{ ($loop->index % 6) + 1 }}"/></svg></span>
        <h3>{{ $b->nama }}</h3><p>{{ $b->ringkas }}</p><span class="lg">Jelajahi →</span>
      </a></li>
    @empty
      <li class="kosong">Belum ada bidang. Jalankan <code>php artisan db:seed --class=JalurSeeder</code>.</li>
    @endforelse
  </ul>
</section>
<section class="band" aria-labelledby="lebih">
  <div class="fotoband"><img src="{{ asset('img/group.svg') }}" alt="Ilustrasi sekelompok anak muda berkumpul di satu meja"></div>
  <div class="isi"><h2 id="lebih">Lebih dari program, ini tentang kamu.</h2><p>Mahreen Indonesia adalah ruang untuk belajar, berkolaborasi, dan menciptakan dampak nyata bagi Indonesia, dimulai dari hal-hal kecil.</p></div>
  <div class="stat">
    <div><b>{{ $bidang->count() }}</b><span>Bidang utama</span></div>
    <div><b>{{ $jmlProgram }}</b><span>Program terjadwal</span></div>
    <div><b>{{ $jmlTanya }}</b><span>Pertanyaan di alurmu</span></div>
  </div>
</section>
<section class="cta">
  <span class="pnh" aria-hidden="true">→</span>
  <div><h3>Siap menemukan jalurmu?</h3><p>Mulai ceritamu sekarang dan temukan program yang cocok untukmu.</p></div>
  <a class="btn" href="{{ route('langkah') }}">Mulai Sekarang <span aria-hidden="true">→</span></a>
</section>
@endsection
