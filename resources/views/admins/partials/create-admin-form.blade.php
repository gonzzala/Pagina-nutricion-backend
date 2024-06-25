<section>

    <x-input-error class="mb-2" :messages="$errors->all()" />

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Crear administrador') }} 
        </h2>
    </header>

    <form action="{{ route('admins.store') }}" method="POST" class="mt-6 space-y-6">
        @csrf

    <div>
        <x-input-label for="name" :value="__('Nombre del administrador')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" />
    </div>

    <div>
        <x-input-label for="password" :value="__('Contraseña')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" required autocomplete="password" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" :value="old('password_confirmation')" required autocomplete="password_confirmation" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Crear administrador') }}</x-primary-button>
    </div>

    </form>

</section>