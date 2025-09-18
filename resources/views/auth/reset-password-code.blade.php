@extends('layouts.site')

@section('content')
    <div class="max-w-md p-6 mx-auto mt-12 bg-white rounded shadow">
        <h1 class="mb-4 text-xl font-bold">Digite o código e nova senha</h1>

        <form action="{{ route('password.code.reset') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ old('email', request('email')) }}">

            <label class="block mb-2">Código:</label>
            <input type="text" name="code" class="w-full p-2 mb-4 border rounded" required>

            <label class="block mb-2">Nova senha:</label>
            <input type="password" name="password" class="w-full p-2 mb-4 border rounded" required>

            <label class="block mb-2">Confirmar senha:</label>
            <input type="password" name="password_confirmation" class="w-full p-2 mb-4 border rounded" required>

            <button type="submit" class="w-full py-2 text-white bg-green-600 rounded">Redefinir Senha</button>
        </form>
    </div>
@endsection
