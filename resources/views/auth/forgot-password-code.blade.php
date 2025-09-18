@extends('layouts.site')

@section('content')
    <div class="max-w-md p-6 mx-auto mt-12 bg-white rounded shadow">
        <h1 class="mb-4 text-xl font-bold">Recuperar Senha</h1>

        <form action="{{ route('password.code.send') }}" method="POST">
            @csrf
            <label class="block mb-2">Digite seu e-mail:</label>
            <input type="email" name="email" class="w-full p-2 mb-4 border rounded" required>

            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded">Enviar código</button>
        </form>
    </div>
@endsection
