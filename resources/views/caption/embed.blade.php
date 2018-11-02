<!doctype html>
@if ($caption->language)
<html lang="{{ $caption->language->langcode }}">
@else
<html>
@endif
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
    <script>
        var vtt = {!! $json !!};
    </script>
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
            <h2 id="clock" data-media-duration="{{ $caption->media_duration }}" data-media-current="{{ $caption->media_current_time }}" data-updated="{{ $updated }}">00:00:00</h2>
            <p>The media is {{ $caption->media_duration }} seconds long, and was last started <span id="updated-text">__</span> seconds ago.</p>
            <div id="vtt">
                @foreach ($vtt as $key => $cue)
                    <div id="cue-{{ $key }}" class="cue" @if ($cue['start'])data-start="{{ $cue['start'] }}" @endif @if ($cue['end'])data-end="{{ $cue['end'] }}" @endif @if ($cue['voice']) data-voice="{{ $cue['voice'] }}" @endif @if ($cue['identifier']) data-identifier="{{ $cue['identifier'] }}"@endif>
                        @if ($cue['text'])
                            {{ $cue['text'] }}
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="alert">Caption not found.</p>
        @endif
    </div>
</body>
</html>
