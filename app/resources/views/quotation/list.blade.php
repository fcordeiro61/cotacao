<x-app-layout>
    @section('title', __('Quotation List'))

    @section('scroll', '')

    <div class="list-header">
        <h3>{{ __('Quotation List') }}</h3>

        <x-primary-button onclick="window.location='{{ route('quotation.create') }}'">
            <i class="fas fa-file-alt"></i>&nbsp;{{ __('Nova Cotação') }}
        </x-primary-button>
    </div>

    <div class="list-alert">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="list-scroll">
        @foreach($quotations as $quotation)
            <div class="list-card">
                <div class="list-detail">
                    @if($quotation->active)
                    @else
                        <div style="color: gray;">
                    @endif

                    <h4>{{ $quotation->title ?? 'No title' }}</h4>
                    <p>Cliente: {{ $quotation->customer->name ?? 'N/A' }}</p>
                    <p>Valor: R$ {{ number_format($quotation->value, 2, ',', '.') }}</p>
                    <div class="list-actions">
                        @if($quotation->active)
                            <a href="{{ route('quotation.edit', $quotation->id) }}"
                                class="btn-icon" title="Editar">
                                <i class="fas fa-edit"></i>&nbsp;Editar
                            </a>

                        @endif

                        @if($quotation->active)
                            <form action="{{ route('quotation.deactivate', $quotation->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-icon"
                                    title="Desativar">
                                    <i class="fas fa-ban"></i>&nbsp;Desativar
                                </button>
                            </form>
                        @else
                            <form action="{{ route('quotation.activate', $quotation->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-icon"
                                    title="Ativar">
                                    <i class="fas fa-check-circle"></i>&nbsp;Ativar
                                </button>
                            </form>
                        @endif
                    </div>
                    @if(!$quotation->active)
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
