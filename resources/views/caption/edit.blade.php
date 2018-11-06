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
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($caption)
                            <h4><em>Edit</em> {{ $caption->name }}</h4>
                            <hr />

                            @include('partials.errors')

                        @else
                            <p class="alert">Caption not found.</p>
                        @endif

                            <form method="POST" action="/dashboard/captions/{{ $caption->id }}">

                                {{ method_field('PUT') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label for="nameInput">Name</label>
                                    <input name="name" type="text" class="form-control" id="nameInput" required value="{{ $caption->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionTextarea">Description</label>
                                    <textarea name="description" class="form-control" id="descriptionTextarea" rows="2">{{ $caption->description }}</textarea>
                                </div>
                                <select name="language" class="form-control" id="languageSelect">
                                    @foreach($languages as $language)
                                        @if ($language->id === $caption->language_id)
                                            <option value="{{ $language->id }}" selected>{{ $language->name }}</option>
                                        @else
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="captionTextarea">Caption</label>
                                    <p class="form-text text-muted">A caption in <em>WebVTT</em> format</p>
                                    <textarea name="caption" class="form-control" id="captionTextarea" rows="8" required>{{ $caption->caption }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="durationInput">Media Duration</label>
                                    <input name="media_duration" type="number" class="form-control" id="durationInput" value="{{ $caption->media_duration }}" required>
                                    <p class="form-text text-muted">Duration (in seconds) of the target media.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
