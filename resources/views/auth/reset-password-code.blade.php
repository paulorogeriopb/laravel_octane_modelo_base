@extends('layouts.guest')

@section('content')
    <div class="card-login">

        @include('components.application-logo')

        <x-alert />

        <h1 class="title-login">Recuperar Senha</h1>

        <div class="mt-4 mb-4 text-sm text-center text-gray-600 dark:text-gray-400">
            Digite o código e nova senha
        </div>

        <form action="{{ route('password.code.reset') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ old('email', request('email')) }}">

            <!-- Código -->
            <div class="mt-4 form-group">
                <label for="code" class="form-label">Código:</label>
                <input type="text" name="code" id="code" class="form-input" required>
            </div>


            <!-- Confirm Password -->
            <x-password-input id="password" name="password" label="Senha" required />
            <x-password-input id="password_confirmation" name="password_confirmation" label="Confirmar Senha" required
                showRules="true" />


            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="w-full py-2 mt-4 rounded btn-default-md">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/password-rules.js')
@endpush
