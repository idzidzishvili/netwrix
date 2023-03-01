<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />        
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.css">
        @vite('resources/scss/app.scss')
    </head>
    <body>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.js"></script>
        @vite('resources/js/app.js')
    </body>
</html>
