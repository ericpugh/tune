@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {!! session('status') !!}
                </div>
            @endif

            {{-- Captions Card--}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Captions</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <a class="btn btn-primary btn-lg btn-block" href="/dashboard/captions/create" role="button">Create Caption</a>
                    </div>
                    @if ($captions)
                        <div class="card-text">
                            <ul class="list-group captions-list">
                                @forelse ($captions as $caption)
                                    <li class="list-group-item row d-flex">
                                        <div class="col col-9">
                                            <a href="/dashboard/captions/{{ $caption->id }}">{{ $caption->name }}</a>
                                        </div>
                                        @include('partials.caption-actions')

                                        <div class="col col-12">
                                            <p class="text-muted">{{ $caption->description }}</p>
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-muted">No captions.</p>
                                @endforelse
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
