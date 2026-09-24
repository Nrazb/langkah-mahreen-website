@extends('layout')
@section('judul', 'Kalender program')
@section('isi')
<div class="kalwrap">
<div>
<h1 class="serif" style="font-size:clamp(2rem,5vw,2.8rem);padding-top:2rem">Kalender Semua Program</h1>
<p class="sub">Temukan program, kegiatan, dan jadwal terbaru di seluruh bidang Mahreen Indonesia.</p>
<ul class="filter" aria-label="Saring menurut bidang">
  <li><a href="{{ route('kalender') }}" @if(! $slug) aria-current="true" @endif>Semua bidang</a></li>
  @foreach ($semua as $b)
    <li><a href="{{ route('kalender', ['bidang' => $b->slug]) }}" @if($slug === $b->slug) aria-current="true" @endif>{{ $b->nama }}</a></li>
  @endforeach
</ul>
@include('timeline', ['programs' => $programs])
</div>
<div class="ilus" style="align-self:start;padding-top:3rem"><img src="{{ asset('img/kalender.svg') }}" alt="Ilustrasi pemuda bertopi dengan ransel dan kalender"><span class="tulis t2" style="left:0;top:1rem">Jadwal<br>hari ini,<br>jalan<br>esok</span></div>
</div>
@endsection
