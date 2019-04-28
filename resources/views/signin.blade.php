@extends('navbar')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col l6 m6 s12 offset-l3 offset-m3">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">Login or create an account</span>
                        <div class="row">
                            <form class="login" action="{{ route('login') }}" method="POST" class="col s12" autocomplete="off">
                                @csrf
                                @if (count( $errors ) > 0)
                                    @foreach ($errors->all() as $error)
                                    <p class="error center-align">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="email">Email</label>
                                        <input class="black-text login-form" name="email" type="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="row r1">
                                    <div class="input-field col s12">
                                        <label for="password">Password</label>
                                        <input class="black-text login-form" name="password" value="{{ old('password') }}" type="password">
                                    </div>
                                </div>
                                <div class="row r2">
                                    <div class="input-field col s12 center-align">
                                        <button class="btn-small white black-text" type="submit">Log in</button>
                                        <br>
                                        <p>don't have an account? <a href="{{ route('signup') }}">click here.</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="row r3">
                            <div class="col l12 m12 s12 xs12">
                                <p class="center-align">or</p>
                            </div>
                        </div>
                        <br>
                        <div class="row r4">
                            <div class="col l12 m12 s12 xs12">
                                <a href="{{ route('login.provider', 'google') }}"><button class="btn-small gg col l8 m12 s12 offset-l2" type="submit"><i class="login-as fab fa-google"></i>login as Google</button></a>
                            </div>
                            <br><br>
                            <div class="col l12 m12 s12 xs12">
                                <a href="{{ route('login.provider', 'facebook') }}"><button class="btn-small fb col l8 m12 s12 offset-l2" type="submit"><i class="login-as fab fa-facebook"></i>login as Facebook</button><a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection