@extends('layout')
@section('judul', 'Jelajahi jalur')
@section('isi')
<section class="langkah narrow">
@if (session('galat'))<p class="galat" role="alert">{{ session('galat') }}</p>@endif
@if ($kosong)
  <div class="kosong">
    <h1 class="serif" style="font-size:1.6rem">Ceritanya belum ditulis.</h1>
    <p>Belum ada pertanyaan di database. Jalankan <code>php artisan db:seed --class=JalurSeeder</code> atau isi tabel <code>simpul</code> dan <code>pilihan</code>.</p>
  </div>
@else
  <p class="n">Langkah {{ count($ids) + 1 }}</p>
  <h1>{{ $simpul->teks }}</h1>
  <ul class="pilihan">
    @foreach ($simpul->pilihan as $p)
      <li><a href="{{ route('langkah', ['p' => implode(',', array_merge($ids, [$p->id]))]) }}">{{ $p->label }}</a></li>
    @endforeach
  </ul>
  @if (count($ids))
    <a class="tautan" href="{{ route('langkah', count($ids) > 1 ? ['p' => implode(',', array_slice($ids, 0, -1))] : []) }}">Kembali satu langkah</a>
  @endif
@endif
</section>
@endsection
