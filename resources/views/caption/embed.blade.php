<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if ($caption)
        <title>{{ $caption->name }}</title>
    @else
        <title>Tune Embed</title>
    @endif

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
        @if ($caption)
            <h1>{{ $caption->name }}</h1>
            <p>Current time: {{ $caption->media_current_time }}</p>
            <div>{{ $caption->caption }}</div>
        @else
            <p class="alert">Caption not found.</p>
        @endif
    </div>
</body>
</html>
