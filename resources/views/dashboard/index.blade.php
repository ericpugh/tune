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
                    Dashboard
                </div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/dashboard/captions/create" role="button">Create Caption</a>
                    @if ($captions)
                        <h4>Captions</h4>
                        <ul class="list-group">
                        @foreach ($captions as $caption)
                            <li class="list-group-item row d-flex">
                                <div class="col col-8">
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
                            </li>
                        @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
