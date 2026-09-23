<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul', 'Pilih Jalurmu, Temukan Waktumu') | Mahreen Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/theme.js') }}"></script>
</head>
<body>
    <header class="top"><div class="wrap">
    <a class="brand" href="{{ route('beranda') }}">Mahreen Indonesia</a>
    <nav class="main" aria-label="Utama">
        <a href="{{ route('langkah') }}" @if(request()->routeIs('langkah','hasil')) aria-current="page" @endif>Jelajahi jalur</a>
        <a href="{{ route('kalender') }}" @if(request()->routeIs('kalender')) aria-current="page" @endif>Kalender</a>
    </nav>
    <button type="button" id="tema" class="tema" aria-pressed="false">Mode gelap</button>
    </div></header>
    <main><div class="wrap">@yield('isi')</div></main>
    <footer><div class="wrap">Bidang, pertanyaan, dan jadwal di situs ini masih data contoh/dummy untuk keperluan test internship.</div></footer>
</body>
</html>
