@extends('layout')
@section('judul', 'Kalender program')
@section('isi')
<h1 class="serif" style="font-size:clamp(2rem,5vw,3rem)">Kalender semua program</h1>
<ul class="filter" aria-label="Saring menurut bidang">
  <li><a href="{{ route('kalender') }}" @if(! $slug) aria-current="true" @endif>Semua bidang</a></li>
  @foreach ($semua as $b)
    <li><a href="{{ route('kalender', ['bidang' => $b->slug]) }}" @if($slug === $b->slug) aria-current="true" @endif>{{ $b->nama }}</a></li>
  @endforeach
</ul>
@include('timeline', ['programs' => $programs])
@endsection
