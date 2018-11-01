@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
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
                                        <div class="col col-7">
                                            <a href="/dashboard/captions/{{ $caption->id }}">{{ $caption->name }}</a>
                                        </div>
                                        <div class="col col-3">
                                            <p class="text-muted">{{ $caption->updated_at->toFormattedDateString() }}</p>
                                        </div>
                                        <div class="col col-1">
                                            <form action="/dashboard/captions/{{ $caption->id }}" method="post">
                                                {{ method_field('delete') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-danger" type="submit">
                                                    <span class="oi oi-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col col-1">
                                            <a class="btn btn-info" target="_blank" href="/embed/{{ $caption->id }}">
                                                <span class="oi oi-code"></span>
                                            </a>
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
