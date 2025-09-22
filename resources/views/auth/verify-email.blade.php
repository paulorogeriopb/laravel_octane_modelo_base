@extends('layouts.guest')

@section('content')
    <div class="card-login">

        @include('components.application-logo')

        <x-alert />


        <h1 class="title-login">Verificação de Código</h1>
        <p class="title-subtitle">Verificação de Código</p>

        @if (session('success'))
            <div class="p-2 mb-4 text-green-800 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('email-verification.verify') }}" method="POST">
            @csrf



            <div class="form-group-login">
                <!--<label for="code" class="form-label">Digite o código recebido:</label> -->
                <input id="code" type="text" name="code" placeholder="Digite o código recebido:" required
                    autofocus autocomplete="username" class="form-input">
                @error('code')
                    <p class="mb-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>




            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="w-full py-2 mt-4rounded btn-default-md">
                    Verificar</button>
            </div>
        </form>
    </div>
@endsection
