@extends('layouts.log')

@section('content')

          <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="">{{ __('Name') }}</label> --}}

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Enter Your Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Capture Your Email Address"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Enter Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Re-Enter Your Password"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                       <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <div class="text-center dont-have">Already have an account? <a href="{{url('login')}}">Login</a>
           
@endsection
