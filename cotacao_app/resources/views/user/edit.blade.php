<x-app-layout>
    @section('title', __('Edit User'))

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card">
        <div class="card-body">
            <div class="card-title">{{ __('Edit User') }}</div>

            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        {{ __('Name') }}
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        {{ __('Email') }}
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for= "role" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Role') }}
                    </label>

                    <select id="role" name="role_id" class="mt-1 block w-full" required>
                        <option value="">{{ __('Select a Role') }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $role->id == old('role_id', $user->role_id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="button-container">

                    <x-primary-button>
                        <i class="fa-solid fa-check"></i>&nbsp;{{ __('Save') }}
                    </x-primary-button>

                    <!--
                            <a href="{{ route('user.list') }}" class="text-gray-600 hover:underline ml-4">{{ __('Cancel') }}</a>
-->



                    <x-button-cancel onclick="window.location='{{ route('customer.list') }}'">
                        <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Back') }}
                    </x-button-cancel>

                </div>




            </form>

        </div>
    </div>

</x-app-layout>
