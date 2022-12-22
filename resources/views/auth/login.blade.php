@extends('layouts.index')

@section('index-content')
<div class="container relative mx-auto max-w-5xl bg-white px-20 py-10 rounded-lg my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flex text-4xl font-bold mb-6 basis-full justify-center">{{ __('Authorization') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" x-data x-validate>
                        @csrf

                        <div class="row mb-3">
                            <div class="flex col-md-6">
                                <input id="email" type="email" placeholder="Login" class="border-2 rounded-md p-1 basis-full my-1" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="flex col-md-6">
                                <input id="password" type="password" placeholder="Password" class="border-2 rounded-md p-1 basis-full my-1" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="flex row mt-5 justify-between">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-red-600 rounded-md py-2 px-8 mr-2 ml-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-6 offset-md-4 my-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
