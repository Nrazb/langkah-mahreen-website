<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('judul', 'Berkarya untuk Indonesia') | Mahreen Indonesia</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Caveat:wght@600&family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,700;1,9..144,500;1,9..144,700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/theme.js') }}"></script>
</head>
<body>
<header class="top"><div class="wrap">
  <a class="brand" href="{{ route('beranda') }}">Mahreen<br>Indonesia</a>
  <nav class="main" aria-label="Utama">
    <a href="{{ route('beranda') }}" @if(request()->routeIs('beranda')) aria-current="page" @endif>Beranda</a>
    <a href="{{ route('langkah') }}" @if(request()->routeIs('langkah','hasil')) aria-current="page" @endif>Jelajahi Jalur</a>
    <a href="{{ route('kalender') }}" @if(request()->routeIs('kalender')) aria-current="page" @endif>Kalender</a>
  </nav>
  <button type="button" id="tema" class="tema" aria-pressed="false"><span></span><b class="sr">Mode gelap</b></button>
</div></header>
<main><div class="wrap">@yield('isi')</div></main>
<footer><div class="wrap">
  <a class="brand" href="{{ route('beranda') }}">Mahreen<br>Indonesia</a>
  <nav aria-label="Footer"><a href="{{ route('beranda') }}">Beranda</a><a href="{{ route('langkah') }}">Jelajahi Jalur</a><a href="{{ route('kalender') }}">Kalender</a></nav>
  <span>© {{ date('Y') }} Mahreen Indonesia. Berkarya untuk Indonesia. Isi program masih data dummy.</span>
</div></footer>
@stack('skrip')
</body>
</html>
