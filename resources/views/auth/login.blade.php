{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="login-wrap">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" name="email" type="text" class="input">
                        @error('email')
                            <p class="text-danger" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" name="password" class="input" data-type="password">
                        @error('password')
                            <p class="text-danger" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
    </form>
    {{-- <form action="#" method="post"> --}}
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="sign-up-htm">
            <div class="group">
                <label for="user" class="label">Name</label>
                <input name="name" type="text" class="input">
                <input name="role" type="hidden" class="input" value="0">
                <input name="status" type="hidden" class="input" value="0">
                <input name="room_id" type="hidden" class="input" value="1">
                <input name="phone" type="hidden" class="input" value="0">
                <input name="avatar" type="hidden" class="input" value="">
                <input name="birthday" type="hidden" class="input" value="">

            </div>
            <div class="group">
                <label for="user" class="label">Username</label>
                <input name="username" type="text" class="input">
            </div>
            <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" name="password" type="password" class="input" data-type="password" autocomplete="new-password">
            </div>
            <div class="group">
                <label for="pass" class="label">Repeat Password</label>
                <input id="pass" name="confirm" type="password" class="input" data-type="password" autocomplete="new-password">
            </div>
            <div class="group">
                <label for="pass" class="label">Email Address</label>
                <input id="pass" name="email" type="text" class="input">
            </div>
            <div class="group">
                <input type="submit" class="button butt-signup" value="Sign Up">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
                <label for="tab-1">Already Member?</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
