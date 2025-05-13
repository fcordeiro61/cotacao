<x-app-layout>
    @section('title', __('New Quotation'))
    @section('scroll', '')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="list-header">
        <h3>{{ __('New Quotation') }}</h3>
    </div>
    <div class="list-scroll">
        <div class="list-card">
            <div class="list-detail">

                @if($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('quotation.store') }}">
                    @csrf
                    @method('POST')



                    <!-- Valor -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="value">
                            {{ __('Value') }}
                        </label>
                        <input type="number" name="value" id="value"
                            value="{{ old('value') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                            {{ __('Status') }}
                        </label>
                        <select name="status" id="status"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">{{ __('Select Status') }}</option>
                            <option value="Pendente" {{ old('status') == 'Pendente' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                            <option value="Aprovado" {{ old('status') == 'Aprovado' ? 'selected' : '' }}>{{ __('Approved') }}</option>
                            <option value="Rejeitado" {{ old('status') == 'Rejeitado' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                        </select>
                    </div>

                    <!-- Data de Validade -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="valid_until">
                            {{ __('Valid Until') }}
                        </label>
                        <input type="date" name="valid_until" id="valid_until"
                            value="{{ old('valid_until') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Had Claim - Sim ou Não -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="had_claim">
                            {{ __('Had Claim?') }}
                        </label>
                        <select name="had_claim" id="had_claim"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="0" {{ old('had_claim') == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                            <option value="1" {{ old('had_claim') == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                        </select>
                    </div>

                    <!-- Outras informações que já estavam no seu código -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="request_date">
                            {{ __('Request Date') }}
                        </label>
                        <input type="date" name="request_date" id="request_date"
                            value="{{ old('request_date') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="button-container">
                        <x-primary-button>
                            <i class="fa-solid fa-check"></i>&nbsp;{{ __('Submit') }}
                        </x-primary-button>

                        <x-button-cancel onclick="window.location='{{ route('quotation.list') }}'">
                            <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Back') }}
                        </x-button-cancel>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>

