@extends('layout')
@section('judul', 'Jelajahi jalur')
@section('isi')
@if (session('galat'))<p class="galat" role="alert">{{ session('galat') }}</p>@endif
@if ($kosong)
  <div class="kosong narrow">
    <h1 class="serif" style="font-size:1.6rem">Ceritanya belum ditulis.</h1>
    <p>Belum ada pertanyaan di database. Jalankan <code>php artisan db:seed --class=JalurSeeder</code>.</p>
  </div>
@else
<div class="atas">
  <a class="tautan" href="{{ route('langkah', count($ids) > 1 ? ['p' => implode(',', array_slice($ids, 0, -1))] : []) }}">← {{ count($ids) ? 'Kembali' : 'Mulai' }}</a>
  <div class="progres"><span>Langkah {{ count($ids) + 1 }} dari {{ $total }}</span>@for ($i = 1; $i <= $total; $i++)<i class="{{ $i <= count($ids) + 1 ? 'on' : '' }}"></i>@endfor</div>
</div>
<section class="langkah duakolom">
  <div>
    <span class="jalurno">JALUR {{ str_pad(count($ids) + 1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($total, 2, '0', STR_PAD_LEFT) }}</span>
    <h1>{{ $simpul->teks }}</h1>
    <p class="sub">Pilih satu jawaban yang paling menggambarkan dirimu.</p>
    <ul class="pilihan">
      @foreach ($simpul->pilihan as $p)
        <li><a href="{{ route('langkah', ['p' => implode(',', array_merge($ids, [$p->id]))]) }}"><span class="blob" aria-hidden="true"><svg><use href="{{ asset('img/ikon.svg') }}#i{{ ($loop->index % 6) + 1 }}"/></svg></span>{{ $p->label }}</a></li>
      @endforeach
    </ul>
    @if (count($ids))<a class="tautan" href="{{ route('langkah', count($ids) > 1 ? ['p' => implode(',', array_slice($ids, 0, -1))] : []) }}">← Kembali satu langkah</a>@endif
  </div>
  <div class="ilus"><img src="{{ asset('img/langkah.svg') }}" alt="Ilustrasi pemuda berheadphone"><span class="tulis t2">Setiap<br>jawaban<br>adalah<br>langkah</span></div>
</section>
@endif
@endsection
