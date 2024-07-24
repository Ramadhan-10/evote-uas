@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex h-screen justify-center items-center mt-25 ">

            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg ">
                    <div class="bg-gray-200 px-6 py-4 rounded-t-lg ">
                        {{ __('Login') }}
                    </div>

                    <div class="px-6 py-4">
                        @if (session('success'))
                            <div class="alert alert-success flex items-center p-4 mb-4 text-green-800 bg-green-100 rounded-lg"
                                role="alert">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" aria-hidden="true" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="sr-only">Success</span>
                                <div>{{ session('success') }}</div>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-error flex items-center p-4 mb-4 text-red-800 bg-red-100 rounded-lg"
                                role="alert">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" aria-hidden="true" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span class="sr-only">Error</span>
                                <div>{{ session('error') }}</div>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-input rounded-md shadow-sm w-full @error('email') border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="text-red-500 text-sm mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-input rounded-md shadow-sm w-full @error('password') border-red-500 @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="text-red-500 text-sm mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input class="form-checkbox h-4 w-4 text-blue-600" type="checkbox" name="remember"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="ml-2 block text-gray-900" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
