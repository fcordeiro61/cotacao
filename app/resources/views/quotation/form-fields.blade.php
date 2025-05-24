{{-- resources/views/quotation/partials/form-fields.blade.php --}}
@csrf

<div class="list-card">
    <div class="list-detail">
        <div class="mb-4" hidden>
            <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">Cliente (ID)</label>
            <input type="text" name="customer_id" required
                value="{{ old('customer_id', $quotation->customer_id ?? ($customer->id ?? '')) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <x-form.readonly label="Nome" name="customer_name" :value="old('customer_name', $customer->name ?? ($quotation->customer->name ?? ''))" />
        <x-form.readonly label="CPF" name="customer_cpf" :value="old('customer_cpf', $customer->cpf ?? ($quotation->customer->cpf ?? ''))" />
        <x-form.readonly label="Email" name="customer_email" :value="old('customer_email', $customer->email ?? ($quotation->customer->email ?? ''))" />
    </div>
</div>

<div class="list-card">
    <div class="list-detail">
        <x-form.input type="date" name="request_date" label="Data da Solicitação" required :value="old('request_date', $quotation->request_date ?? '')" />

        <x-form.select name="insurance_type" label="Tipo de Seguro" required :value="old('insurance_type', $quotation->insurance_type ?? '0')" :options="['0' => 'Novo', '1' => 'Renovação']" />

        <div name="renov_block">
            <x-form.input name="bonus_class" label="Classe de Bônus" :value="old('bonus_class', $quotation->bonus_class ?? '')" />
            <x-form.select name="has_claims" label="Houve Sinistros?" required :value="old('has_claims', $quotation->has_claims ?? '0')" :options="['0' => 'Não', '1' => 'Sim']" />
        </div>
    </div>
</div>

<div class="list-card">
    <div class="list-detail">
        <x-form.input name="vehicle_plate" label="Placa" required :value="old('vehicle_plate', $quotation->vehicle_plate ?? '')" />
        <x-form.input name="vehicle_chassis" label="Chassi" required :value="old('vehicle_chassis', $quotation->vehicle_chassis ?? '')" />
        <x-form.input name="vehicle_brand" label="Marca" required :value="old('vehicle_brand', $quotation->vehicle_brand ?? '')" />
        <x-form.input name="vehicle_model" label="Modelo" required :value="old('vehicle_model', $quotation->vehicle_model ?? '')" />
        <x-form.input name="manufacture_year" label="Ano" type="number" required :value="old('manufacture_year', $quotation->manufacture_year ?? '')" />
        <x-form.input name="overnight_zipcode" label="CEP de Pernoite" required :value="old('overnight_zipcode', $quotation->overnight_zipcode ?? '')" />
    </div>
</div>

<div class="list-card">
    <div class="list-detail">
        <x-form.input name="driver_age" label="Idade do Condutor" type="number" required :value="old('driver_age', $quotation->driver_age ?? '')" />
        <x-form.input name="license_time" label="Tempo de Habilitação" required :value="old('license_time', $quotation->license_time ?? '')" />
    </div>
</div>

<div class="list-card">
    <div class="list-detail">
        <x-form.select name="has_insurer_preference" label="Tem seguradora preferida?" required :value="old('has_insurer_preference', $quotation->has_insurer_preference ?? '0')"
            :options="['0' => 'Não', '1' => 'Sim']" />

        <div class="mb-4" name="preferred_insurer_block">
            <label for="preferred_insurer" class="block text-gray-700 text-sm font-bold mb-2">Seguradora
                Preferida</label>
            <input type="text" name="preferred_insurer"
                value="{{ old('preferred_insurer', $quotation->preferred_insurer ?? '') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>
    </div>
</div>
