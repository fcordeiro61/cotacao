<x-app-layout>
    @section('title', __('Edit Customer'))
    @section('scroll', '')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="list-header">
        <h3>{{ __('Edit Customer') }}</h3>
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

                <form method="POST" action="{{ route('customer.update', $customer->id) }}">

@csrf
@method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            {{ __('Name') }}
                        </label>
                        <input type="text" name="name"
                            value="{{ old('name', $customer->name ?? '') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            {{ __('Email') }}
                        </label>
                        <input type="email" name="email"
                            value="{{ old('email', $customer->email ?? '') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for=birth_date">
                            {{ __('Data de Nascimento') }}
                        </label>
                        <input type="date" name="birth_date" class="form-control"
                            value="{{ old('birth_date', $customer->birth_date ?? '') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="is_foreign">
        Estrangeiro?
    </label>
    
    <select name="is_foreign" id="is_foreign"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="0" {{ old('is_foreign', $customer->is_foreign ?? '') == 0 ? 'selected' : '' }}>Não</option>
        <option value="1" {{ old('is_foreign', $customer->is_foreign ?? '') == 1 ? 'selected' : '' }}>Sim</option>
    </select>

</div>
{{-- CPF (só se não for estrangeiro) --}}
<div id="cpf_field" class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="cpf">CPF</label>
    <input type="text" name="cpf" id="cpf"
        value="{{ old('cpf', $customer->cpf ?? '') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>

{{-- RNM (só se for estrangeiro) --}}
<div id="rnm_field" class="mb-4 hidden">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="rnm">RNM</label>
    <input type="text" name="rnm" id="rnm"
        value="{{ old('rnm', $customer->rnm ?? '') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>



                    </div>
                    </div>
                    <div class="list-card">
                        <div class="list-detail">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for=zip_code">
                                    {{ __('CEP') }}
                                </label>
                                <input type="text" name="zip_code" class="form-control"
                                    value="{{ old('zip_code', $customer->zip_code ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="street">Logradouro</label>
                                <input type="text" name="street"
                                    value="{{ old('street', $customer->street ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="number">Número</label>
                                <input type="text" name="number" class="form-control"
                                    value="{{ old('number', $customer->number ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="complement">Complemento</label>
                                <input type="text" name="complement" class="form-control"
                                    value="{{ old('complement', $customer->complement ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            </div>
                    </div>
                    <div class="list-card">
                        <div class="list-detail">
                            <div class="form-group mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="district">Bairro</label>
                                <input type="text" name="district" 
                                    value="{{ old('district', $customer->district ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="form-group mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="city">Cidade</label>
                                <input type="text" name="city" 
                                    value="{{ old('city', $customer->city ?? '') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="form-group mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="state">Estado</label>
<select name="state"
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    <option value="">Selecione um estado</option>
    @php
        $states = [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        ];
    @endphp

    @foreach ($states as $uf => $nome)
        <option value="{{ $uf }}" {{ old('state', $customer->state ?? '') === $uf ? 'selected' : '' }}>
            {{ $nome }}
        </option>
    @endforeach
</select>
    </div>

                          
                            <div class="button-container">

                                <x-primary-button>
                                    <i class="fa-solid fa-check"></i>&nbsp;{{ __('Salve') }}
                                </x-primary-button>


                                <x-button-cancel
                                    onclick="window.location='{{ route('customer.list') }}'">
                                    <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Back') }}
                                </x-button-cancel>

                            </div>
                </form>
            </div>

    </div>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const isForeignSelect = document.getElementById('is_foreign');
        const cpfField = document.getElementById('cpf_field');
        const rnmField = document.getElementById('rnm_field');

        function toggleFields() {
            if (isForeignSelect.value === '1') {
                rnmField.classList.remove('hidden');
            } else {
                rnmField.classList.add('hidden');
            }
        }

        isForeignSelect.addEventListener('change', toggleFields);
        toggleFields(); // Executa na carga inicial
    });
</script>

</x-app-layout>

