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

                {{-- API Access Token Card--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--API Access Token--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--@if ($token)--}}
                            {{--<ul class="list-group">--}}
                                {{--<li class="list-group-item">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label id="token-label">Timekeeper Access Token</label>:--}}
                                        {{--<input aria-labelledby="token-label" class="form-control" type="text" value="{{ $token }}" readonly>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--@else--}}
                        {{--<p class="text-muted">Register an access token to allow updating a Caption's current time.</p>--}}
                        {{--<form action="/dashboard/user/{{ Auth::user()->id }}" method="post">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<button class="btn btn-primary" type="submit">--}}
                                {{--<span class="oi oi-key"></span> Create Access Token--}}
                            {{--</button>--}}
                        {{--</form>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@TODO: Output user info and update password form--}}
                <div class="card">
                    <div class="card-header">
                        Account
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label>Name</label>:
                                {{ $user->name }}
                            </li>
                            <li class="list-group-item">
                                <label>Email</label>:
                                {{ $user->email }}
                            </li>
                            @if ($user->organization)
                                <li class="list-group-item">
                                    <label>Organization</label>:
                                    {{ $user->organization->name }}
                                </li>
                                @else
                                <li class="list-group-item">
                                    <label>TODO</label>:
                                    Add a form to select the user's Organization.
                                </li>
                            @endif
                        </ul>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label>TODO</label>:
                                Reset Password Form.
                            </li>
                        </ul>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label>TODO</label>:
                                API TOKEN Authentication.
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
