@auth
    <x-dropdown-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-dropdown-link>

    <x-dropdown-link :href="route('customer.list')">
        {{ __('Customers') }}
    </x-dropdown-link>

    <x-dropdown-link :href="route('quotation.list')">
        {{ __('Quotation') }}
    </x-dropdown-link>

    <x-dropdown-link :href="route('user.list')">
        {{ __('Usuários') }}
    </x-dropdown-link>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
@else
    <x-dropdown-link :href="route('login')">
        {{ __('Login') }}
    </x-dropdown-link>

    <x-dropdown-link :href="route('register')">
        {{ __('Cadastre-se') }}
    </x-dropdown-link>
@endauth
