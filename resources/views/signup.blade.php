@extends('navbar')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col l6 m6 s12 offset-l3 offset-m3">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">Create an account</span>
                        <div class="row">
                            <form class="login" action="{{ route('register') }}" method="POST" class="col s12" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="username" name="username" type="text" class="{{ $errors->has('username') ? 'invalid black-text' : 'black-text' }} " value="{{ old('username') }}">
                                        <label for="username">Username</label>
                                        @if ($errors->has('username'))
                                            <p class="error">{{ $errors->first('username') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row r1">
                                    <div class="input-field col s12">
                                        <input id="email" name="email" type="email" class="{{ $errors->has('email') ? 'invalid black-text' : 'black-text' }} " value="{{ old('email') }}">
                                        <label for="email">Email</label>
                                        @if ($errors->has('email'))
                                            <p class="error">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row r1">
                                    <div class="input-field col s6">
                                        <input id="password" name="password" type="password" class="{{ $errors->has('password') ? 'invalid black-text' : 'black-text' }} " value="{{ old('password') }}">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s6">
                                    <input id="password" name="password_confirmation" type="password" class="{{ $errors->has('password') ? 'invalid black-text' : 'black-text' }} " value="{{ old('password_confirmation') }}">
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="error center-align">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="row r3">
                                        <div class="input-field center-align col l12 m12 s12 xs12">
                                        <button type="submit" class="btn white black-text">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection