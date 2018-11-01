@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="oi oi-arrow-left"></span>
                    <a href="/dashboard">
                        Captions
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif

                    @if ($caption)
                        <div class="row">
                            <div class="col col-9">
                                <h2>{{ $caption->name }}</h2>
                            </div>
                            @include('partials.caption-actions')
                            <div class="col col-12">
                                <p class="text-muted">{{ $caption->updated_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label id="api-endpoint-label"><span class="oi oi-link-intact"></span>API Endpoint</label>:--}}
                            {{--<input aria-labelledby="api-endpoint-label" class="form-control" type="text" value="/api/captions/{{ $caption->id }}" readonly>--}}
                        {{--</div>--}}
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label>Language</label>:
                                {{ $caption->language->name }}
                            </li>
                            <li class="list-group-item">
                                <label>Media Duration</label>:
                                {{ $caption->media_duration }}
                            </li>
                            <li class="list-group-item">
                                <label>Media Current Time</label>:
                                {{ $caption->media_current_time }}
                            </li>
                            <li class="list-group-item">
                                <label>Timekeeper</label>:
                                {{ $caption->timekeeper }}
                            </li>
                        </ul>
                        <div class="text-justify ">{{ $caption->caption }}</div>
                    @else
                        <p class="alert">Caption not found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
