<x-guest-layout>
    <!-- Session Status -->
    @section('title', 'Login')

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="card"> 
    <div class="card-body">
    <h1 class="card-title">Acesso ao Sistema</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" 
            />
            <div class="relative">
        <!-- Ícone -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-user text-gray-400"></i>
        </div>
            <x-text-input id="email" 
            class="block mt-1 w-full pl-8" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
            placeholder="Seu email"
            />
</div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
        <!-- Ícone -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-lock text-gray-400"></i>
        </div>
            <x-text-input id="password" class="block mt-1 w-full pl-8"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Sua Senha"
                             />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
         <!--
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        -->

        <div class="button-container">
            <!--
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
                </a>
            @endif



            <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Log in') }}
            </button>
--> 
         <!--   
        <div class="signup-link text-center">
-->  
<div>
        Novo?&nbsp; <a class="justify-start underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">Cadastre-se</a>
        </div>
            
            <x-primary-button>
            <i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Log in') }}
            </x-primary-button>

        <!--
        <div class="signup-link text-center">
          Novo? <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">Cadastre-se</a>
        </div>
-->
    </form>
</div>
</div>
</x-guest-layout>
