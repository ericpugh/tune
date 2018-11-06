<!doctype html>
@if (isset($capiton) && $caption->language)
<html lang="{{ $caption->language->langcode }}">
@else
<html>
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($caption))
        <title>{{ $caption->name }}</title>
    @else
        <title>Tune Embed</title>
    @endif
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/embed.js') }}" defer></script>
    <script>
        @if (isset($json))
            var vtt = {!! $json !!};
        @endif
    </script>
    <script>
        document.addEventListener( "DOMContentLoaded", function() {

            var wrapper = Popcorn.HTMLNullVideoElement( "#null" );
            // This is the time in seconds, if you want fractions of a second, use 30.5
            wrapper.src = "#t=,{{ $caption->media_duration }}";
            // If the start time hasn't been updated default to zero.
            var duration = {{ $caption->media_duration }};
            var updated = {{ $updated }};
            var start = (updated < duration) ? updated : 0;

            var pop = Popcorn(wrapper);
            var $transcript = $('#transcript');
            var $cues = $transcript.find('.cue');

            pop.currentTime(start).play();
            pop.code({
                start: start,
                end: {{ $caption->media_duration }},
                onStart: function( options ) {
                    console.log('playback started.');
                    $('#debug .start-time').html(pop.duration());
                },
                onEnd: function( options ) {
                    console.log('playback ended.');
                    // Reset the transcript.
                    console.log('restart playback.');
                    pop.play();
                    $('#debug .start-time').html(0);
                }
            });

            pop.on("timeupdate", function() {
                var current = this.currentTime();
                $('#debug #current-time').html(current);
                $cues.each(function (index) {
                    // @TODO: use the "vtt" json object with index to get current?
                    var start = $(this).attr('data-start') !== undefined ? $(this).attr('data-start') : 0;
                    var end = $(this).attr('data-end');
                    if (start < current && end > current) {
                        $(this).addClass('current');
                        $(this).removeClass('unread');
                    }
                    else {
                        $(this).removeClass('current')
                    }
                });
            });

        }, false );

    </script>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <style>
        html, body {
            background-color: #FFF;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 1rem;
        }
        #transcript { font-size: 1rem; }
        #transcript .cue.current {
            font-size: 3rem;
            display: block;
            padding: 1rem;
            background-color: #111111;
            color: #FFF;
        }
    </style>
</head>
<body>
    <div class="content">
        @include('partials.errors')
        @if (isset($caption))
            <h1>{{ $caption->name }}</h1>
            <ul id="debug">
                <li>The source media is {{ $caption->media_duration }} seconds long</li>
                <li>The current time in browser is <span id="current-time">__</span></li>
                <li>The <em>media_current_time</em> was reset <span id="start-time">{{ $updated }} seconds ago.</span></li>.
            </ul>
            <video id="null" style="display: none;"></video>
            <div id="transcript">
            @foreach ($vtt as $key => $cue)
                <div id="cue-{{ $key }}" class="cue unread" @if ($cue['start'])data-start="{{ $cue['start'] }}" @endif @if ($cue['end'])data-end="{{ $cue['end'] }}" @endif @if ($cue['voice']) data-voice="{{ $cue['voice'] }}" @endif @if ($cue['identifier']) data-identifier="{{ $cue['identifier'] }}"@endif>
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
