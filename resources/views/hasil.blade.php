@extends('layout')
@section('judul', 'Hasil jalurmu')
@section('isi')
@if ($bidang->isEmpty())
  <div class="kosong narrow">Belum ada bidang yang cocok dengan pilihanmu, karena data bidang masih kosong. <a href="{{ route('langkah') }}">Ulangi ceritanya</a>.</div>
@else
<section class="hasil">
  <div>
    <p class="lbl">Jalurmu mengarah ke</p>
    <h1>{{ $bidang[0]->nama }}</h1>
    <p>{{ $bidang[0]->ringkas }}</p>
    @if ($bidang->count() > 1)
    <div class="kedua">
      <p class="lbl">Jalur kedua yang dekat</p>
      <h2>{{ $bidang[1]->nama }}</h2>
      <p>{{ $bidang[1]->ringkas }}</p>
    </div>
    @endif
  </div>
  <div>
    <h2 class="serif" style="font-size:1.3rem;margin-bottom:.5rem">Kenapa cocok</h2>
    <p>{{ $bidang[0]->alasan }}</p>
    <div class="aksi" style="margin-top:1.5rem">
      <a class="btn" href="{{ route('kalender') }}">Buka kalender semua program</a>
      <a class="tautan" href="{{ route('langkah') }}">Ulangi ceritanya</a>
    </div>
  </div>
</section>
<section aria-labelledby="prog">
  <h2 class="bagian" id="prog">Program yang bisa kamu ikuti</h2>
  @include('timeline', ['programs' => $programs])
</section>
@endif
@endsection
