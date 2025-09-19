<form action="{{ $action }}" method="POST" class="space-y-6">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <!-- Nome -->
    <div>
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário"
            value="{{ old('name', $user->name ?? '') }}"
            class="form-input @error('name') border-red-600 focus:ring-red-500 @enderror" required>
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- E-mail -->
    <div>
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" placeholder="E-mail do usuário"
            value="{{ old('email', $user->email ?? '') }}"
            class="form-input @error('email') border-red-600 focus:ring-red-500 @enderror" required>
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Status -->
    <div class="mb-4">
        <label for="user_status_id" class="form-label">Status do Usuário</label>
        <select name="user_status_id" id="user_status_id"
            class="form-input @error('user_status_id') border-red-600 focus:ring-red-500 @enderror">
            <option value="">-- Selecione o status --</option>
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}"
                    {{ (old('user_status_id') ?? ($user->user_status_id ?? '')) == $status->id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
        @error('user_status_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Papéis -->
    @can('roles-user-edit')
        <div>
            <label class="form-label">Papéis</label>
            <div class="flex flex-wrap gap-4">
                @forelse ($roles as $role)
                    @if ($role != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                        <div class="flex items-center">
                            <input type="checkbox" name="roles[]" id="role_{{ Str::slug($role) }}"
                                value="{{ $role }}"
                                {{ in_array($role, old('roles', $userRoles ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 border-gray-300 rounded text-cor-padrao focus:ring-cor-padrao dark:border-gray-600">
                            <label class="ml-2 form-label" for="role_{{ Str::slug($role) }}">{{ $role }}</label>
                        </div>
                    @endif
                @empty
                    <p class="form-label">Nenhum papel disponível.</p>
                @endforelse
            </div>
            @error('roles')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endcan

    <!-- Senha (somente criação) -->
    @if (is_null($user))
        <div x-data="{ showPassword: false, showConfirm: false }">
            <!-- Senha -->
            <div class="relative mb-4">
                <label for="password" class="form-label">Senha</label>
                <input id="password" name="password" placeholder="Senha do usuário"
                    :type="showPassword ? 'text' : 'password'"
                    class="form-input @error('password') border-red-600 focus:ring-red-500 @enderror pr-10" required>
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 flex items-center px-2 mt-6 text-gray-500 hover:text-gray-700">
                    <!-- Eye open -->
                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path fill-rule="evenodd"
                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <!-- Eye slash -->
                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" />
                        <path
                            d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                    </svg>
                </button>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Senha -->
            <div class="relative mb-4">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Confirmar a senha"
                    :type="showConfirm ? 'text' : 'password'"
                    class="form-input @error('password_confirmation') border-red-600 focus:ring-red-500 @enderror pr-10"
                    required>
                <button type="button" @click="showConfirm = !showConfirm"
                    class="absolute inset-y-0 right-0 flex items-center px-2 mt-6 text-gray-500 hover:text-gray-700">
                    <!-- Eye open -->
                    <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path fill-rule="evenodd"
                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <!-- Eye slash -->
                    <svg x-show="showConfirm" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" />
                        <path
                            d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                    </svg>
                </button>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Validador de força da senha -->
            @include('components.password-rules')

            @push('scripts')
                @vite('resources/js/password-rules.js')
            @endpush
        </div>
    @else
        {{-- Botão para alterar senha no modo de edição --}}
        @can('users-edit-password')
            <div>
                <a href="{{ route('users.edit_password', $user) }}" class="inline-flex items-center gap-2 btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V7.5a4.5 4.5 0 00-9 0v3m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5h-12a1.5 1.5 0 01-1.5-1.5v-7.5a1.5 1.5 0 011.5-1.5z" />
                    </svg>
                    <span>Alterar Senha</span>
                </a>
            </div>
        @endcan
    @endif

    <div class="flex justify-end">
        <button type="submit" class="btn-success">
            {{ $buttonText ?? __('mensagens.save') }}
        </button>
    </div>
</form>
