<x-app-layout>
    @section('title', __('Customer List'))

    @section('scroll', '')



    <div class="list-header">
        <h3>{{ __('Customer List') }}</h3>


        <x-primary-button onclick="window.location='{{ route('customer.create') }}'">
            <i class="fas fa-user-plus"></i>&nbsp;{{ __('New') }}
        </x-primary-button>
    </div>
    <div class="list-alert">
        <!-- Exibindo Mensagem de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Exibindo Mensagem de Erro -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Exibindo Erros de Validação -->
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
        @foreach($customers as $customer)

            <div class="list-card">
                <div class="list-detail">
                    @if($customer->active)
                    @else
                        <div style="color: gray;">
                    @endif
                    
                    <h4>{{ $customer->name }}</h4>
                    <p>Email: {{ $customer->email }}</p>
                    <div class="list-actions">

                        @if($customer->active)

                            <a href="{{ route('customer.edit', $customer->id) }}"
                                class="btn-icon" title="Editar">
                                <i class="fas fa-edit"></i>&nbsp;Editar
                            </a>

                            <a href="{{ route('quotation.create', $customer->id) }}"
                            class="btn-icon" title="Editar">
                            <i class="fas fa-file-alt"></i>&nbsp;{{ __('New Quotation') }}
                            </a>

                        @endif





                        @if($customer->active)

                            <form action="{{ route('customer.deactivate', $customer->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn-icon"
                                    title="{{ $customer->active ? 'Desativar' : 'Ativar' }}">
                                    <i
                                        class="fas fa-user-slash }}"></i>&nbsp;{{ $customer->active ? 'Desativar' : 'Ativar' }}
                                </button>
                            </form>
                        @else
                            <form action="{{ route('customer.activate', $customer->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn-icon"
                                    title="{{ $customer->active ? 'Desativar' : 'Ativar' }}">
                                    <i
                                        class="fas fa-user-check }}"></i>&nbsp;{{ $customer->active ? 'Desativar' : 'Ativar' }}
                                </button>
                            </form>
                    </div>
                @endif

    </div>
    </div>
    </div>
        @endforeach
    </div>



    </div>


</x-app-layout>