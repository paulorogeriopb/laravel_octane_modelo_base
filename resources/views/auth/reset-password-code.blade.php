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

            <!-- Password -->
            <div class="mt-4 form-group" x-data="{ show: false }">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="relative">
                    <input id="password" :type="show ? 'text' : 'password'" name="password" required
                        autocomplete="new-password" class="pr-10 form-input" />

                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 hover:text-gray-700">
                        <!-- Eye open -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path fill-rule="evenodd"
                                d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <!-- Eye slash -->
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22Z"
                                clip-rule="evenodd" />
                            <path
                                d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror


            </div>

            <!-- Confirm Password -->
            <div class="mt-4 form-group" x-data="{ show: false }">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <div class="relative">
                    <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation"
                        required autocomplete="new-password" class="pr-10 form-input" />

                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 hover:text-gray-700">
                        <!-- Eye open -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path fill-rule="evenodd"
                                d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <!-- Eye slash -->
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22Z"
                                clip-rule="evenodd" />
                            <path
                                d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                        </svg>
                    </button>
                </div>
                @error('password_confirmation')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>


            <!-- Começo do aviso de senha -->
            @include('components.password-rules')
            <!-- Fim do aviso de senha -->

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
