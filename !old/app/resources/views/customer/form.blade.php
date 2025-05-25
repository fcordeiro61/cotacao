<form name="formCustomer" method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <x-input label="{{ __('Name') }}" name="name" value="{{ $customer->name ?? '' }}" required />
    <x-input label="{{ __('Email') }}" name="email" type="email" value="{{ $customer->email ?? '' }}" required />
    <x-input label="{{ __('Data de Nascimento') }}" name="birth_date" type="date" value="{{ $customer->birth_date ?? '' }}" required />
    <x-select label="Estrangeiro?" name="is_foreign" :options="['0' => 'Não', '1' => 'Sim']" selected="{{ $customer->is_foreign ?? '' }}" />
    <div id="cpf_field">
        <x-input label="CPF" name="cpf" value="{{ $customer->cpf ?? '' }}" />
    </div>
    <div id="rnm_field" class="hidden">
        <x-input label="RNM" name="rnm" value="{{ $customer->rnm ?? '' }}" />
    </div>

    <x-input label="{{ __('CEP') }}" name="zip_code" value="{{ $customer->zip_code ?? '' }}" required />
    <x-input label="Logradouro" name="street" value="{{ $customer->street ?? '' }}" readonly required />
    <x-input label="Número" name="number" value="{{ $customer->number ?? '' }}" required />
    <x-input label="Complemento" name="complement" value="{{ $customer->complement ?? '' }}" />
    <x-input label="Bairro" name="district" value="{{ $customer->district ?? '' }}" readonly />
    <x-input label="Cidade" name="city" value="{{ $customer->city ?? '' }}" readonly />
    <x-select label="Estado" name="state" :options="$states" selected="{{ $customer->state ?? '' }}" readonly />

    <div class="button-container">
        <x-primary-button>
            <i class="fa-solid fa-check"></i>&nbsp;{{ __('Save') }}
        </x-primary-button>
        <x-button-cancel onclick="window.location='{{ route('customer.list') }}'">
            <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Back') }}
        </x-button-cancel>
    </div>
</form>