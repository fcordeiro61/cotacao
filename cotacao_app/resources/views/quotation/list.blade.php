<x-app-layout>
    @section('title', __('Quotation List'))

    @section('scroll', '')

    <div class="list-header">
        <h3>{{ __('Quotation List') }}</h3>


    </div>

    <div class="list-alert">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="list-scroll">
        @foreach ($quotations as $quotation)
            <div class="list-card">
                <div class="list-detail">
                    {{-- Dados do cliente --}}
                    <p><strong>Cliente:</strong>
                        {{ $quotation->customer->name ?? 'N/A' }}</p>
                    <p><strong>CPF:</strong> {{ $quotation->customer->cpf ?? 'N/A' }}
                    </p>
                    <p><strong>Telefone:</strong>
                        {{ $quotation->customer->phone ?? 'N/A' }}</p>
                    <p><strong>E-mail:</strong>
                        {{ $quotation->customer->email ?? 'N/A' }}</p>

                    {{-- Dados da cotação --}}
                    <p><strong>Placa:</strong> {{ $quotation->vehicle_plate ?? 'N/A' }}
                    </p>
                    <p><strong>Marca:</strong> {{ $quotation->vehicle_brand ?? 'N/A' }}
                    </p>
                    <p><strong>Modelo:</strong> {{ $quotation->vehicle_model ?? 'N/A' }}
                    </p>
                    <p><strong>Ano:</strong> {{ $quotation->manufacture_year ?? 'N/A' }}
                    </p>

                    <!-- <p><strong>Valor:</strong> R$
                        {{ number_format($quotation->value ?? 0, 2, ',', '.') }}
                    </p> -->

                    <div class="list-actions">
                        <a href="{{ route('quotation.edit', $quotation->id) }}" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>&nbsp;Editar
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
