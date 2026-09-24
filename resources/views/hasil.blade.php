@extends('layout')
@section('judul', 'Hasil jalurmu')
@section('isi')
@if ($bidang->isEmpty())
  <div class="kosong narrow">Belum ada bidang yang cocok dengan pilihanmu, karena data bidang masih kosong. <a href="{{ route('langkah') }}">Ulangi ceritanya</a>.</div>
@else
<section class="hasil">
  <div>
    <span class="lbl pill">JALUR YANG KAMU TEMUKAN</span>
    <div class="judulhasil"><span class="blob" aria-hidden="true"><svg><use href="{{ asset('img/ikon.svg') }}#i1"/></svg></span><h1>{{ $bidang[0]->nama }}</h1></div>
    <p>{{ $bidang[0]->ringkas }}</p>
    @if ($bidang->count() > 1)
    <div class="kedua"><span class="blob" aria-hidden="true"><svg><use href="{{ asset('img/ikon.svg') }}#i2"/></svg></span><div>
      <p class="lbl" style="margin:0">Jalur kedua yang dekat</p>
      <h2>{{ $bidang[1]->nama }}</h2>
      <p>{{ $bidang[1]->ringkas }}</p>
    </div></div>
    @endif
  </div>
  <div>
    <h2 class="serif" style="font-size:1.3rem;margin-bottom:.5rem">Kenapa cocok?</h2>
    <p>{{ $bidang[0]->alasan }}</p>
    <div class="aksi" style="margin-top:1.5rem">
      <a class="btn" href="{{ route('kalender') }}">Lihat Program <span aria-hidden="true">→</span></a>
      <a class="tautan" href="{{ route('langkah') }}">Ulangi ceritanya</a>
    </div>
    <div class="ilus" style="margin-top:1.5rem"><img src="{{ asset('img/group.svg') }}" alt="Ilustrasi anak muda bekerja bersama"></div>
    <p class="aksi" style="margin-top:.5rem">
      <button type="button" class="salin" data-url="{{ request()->fullUrl() }}">Salin tautan hasilku</button>
      <span id="salin-info" role="status"></span>
    </p>
  </div>
</section>
<section aria-labelledby="prog">
  <h2 class="bagian" id="prog">Program yang bisa kamu ikuti</h2>
  @include('timeline', ['programs' => $programs, 'grid' => true])
</section>
@endif
@endsection
@push('skrip')<script src="{{ asset('js/salin.js') }}" defer></script>@endpush
