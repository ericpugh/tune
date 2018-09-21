@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="oi oi-arrow-left"></span>
                        <a href="/dashboard">
                            Dashboard
                        </a>
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>Create a Caption</h4>
                        <hr />

                        @include('partials.errors')

                            <form method="POST" action="/dashboard/captions">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="nameInput">Name</label>
                                    <input name="name" type="text" class="form-control" id="nameInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="descriptionTextarea">Description</label>
                                    <textarea name="description" class="form-control" id="descriptionTextarea" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="captionTextarea">Caption</label>
                                    <p class="form-text text-muted">A caption in <em>WebVTT</em> format</p>
                                    <textarea name="caption" class="form-control" id="captionTextarea" rows="8" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="durationInput">Media Duration</label>
                                    <input name="media_duration" type="number" class="form-control" id="durationInput" required>
                                    <p class="form-text text-muted">Duration (in seconds) of the target media.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
