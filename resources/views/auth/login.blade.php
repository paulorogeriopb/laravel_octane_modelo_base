@extends('layouts.guest')

@section('content')
    <div class="card-login">
        <div class="logo-wrapper-login">
            <h1 class="title-logo">Nimbuns</h1>
        </div>


        <x-alert />


        <h1 class="title-login">Área Restrita</h1>

        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            <div class="form-group-login">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" placeholder="{{ __('Email') }}"
                    value="{{ old('email') }}" required autofocus autocomplete="username" class="form-input">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group-login">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" placeholder="{{ __('Password') }}" required
                    autocomplete="current-password" class="form-input">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="border-gray-300 rounded shadow-sm ">
                    <span class="text-gray-700 dark:text-gray-400 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 btn-group-login">
                <a href="{{ url('forgot-password-code') }}" class="link-default">Recuperar senha</a>
                <button type="submit" class="btn-default-md">{{ __('Log in') }}</button>
            </div>

            <div class="mt-4 text-center">
                <a class="link-default" href="{{ route('register') }}">{{ __('create new account') }}</a>
            </div>
        </form>
    </div>
@endsection
