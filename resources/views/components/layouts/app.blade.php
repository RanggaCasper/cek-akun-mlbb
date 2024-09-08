<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Tools gratis untuk cek informasi akun Mobile Legends.">
        <meta name="keywords" content="cek akun Mobile Legends, tools Mobile Legends, informasi akun ML, statistik Mobile Legends, analisis Mobile Legends">
        <meta name="author" content="RanggaCasper">
        <meta name="robots" content="index, follow">
        
        <meta property="og:title" content="Cek ID Game Mobile Legends">
        <meta property="og:description" content="Tools gratis untuk cek informasi akun Mobile Legends.">
        <meta property="og:url" content="https://mlbb.casperproject.my.id">

        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-blue-700">
        {{ $slot }}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        @stack('scripts')
    </body>
</html>
