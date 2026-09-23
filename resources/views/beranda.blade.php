@extends('layout')
@section('isi')
<section class="hero">
  <h1>Pilih jalurmu, temukan waktumu.</h1>
  <p>Jawab beberapa pertanyaan pendek yang disusun seperti cerita. Di ujung jalan ada bidang ekosistem Mahreen yang paling dekat denganmu, lengkap dengan program dan jadwal yang bisa kamu ikuti.</p>
  <div class="aksi">
    <a class="btn" href="{{ route('langkah') }}">Mulai ceritamu</a>
    <a class="tautan" href="{{ route('kalender') }}">Lihat semua jadwal program</a>
  </div>
  <p class="catatan">Isi bidang dan program masih data contoh.</p>
</section>
@endsection
