<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($caption)
        <title>{{ $caption->name }}</title>
    @else
        <title>Tune Embed</title>
    @endif
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/embed.js') }}" defer></script>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- @TODO: create a simple test to display a JS "clock" that rolls through the seconds from start time to media duration and repeats -->
        @if ($caption)
            <h1>{{ $caption->name }}</h1>
            <h2 id="clock" data-media-duration="{{ $caption->media_current_time }}"></h2>
            <p>Current time: {{ $caption->media_current_time }}</p>
            <div>{{ $caption->caption }}</div>
        @else
            <p class="alert">Caption not found.</p>
        @endif
    </div>
</body>
</html>
