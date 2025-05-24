<x-app-layout>
    @section('title', __('New Quotation'))
    @section('scroll', '')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="list-header">
        <div>
            <h3>{{ __('New Quotation') }}</h3>
        </div>
        @if ($errors->any())
            <br>
            <div>
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <div class="list-scroll">
        <form name="formQuotation" method="POST" action="{{ route('quotation.store') }}" style="display: contents;">
            @csrf
            @method('POST')

            @include('quotation.form-fields', ['quotation' => $quotation])

            <div class="button-container">
                <div class="list-detail flex justify-end space-x-3">
                    <x-primary-button>{{ __('Salvar Cotação') }}</x-primary-button>

                    <x-button-cancel onclick="window.location='{{ route('customer.list') }}'">
                        <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Cancelar') }}
                    </x-button-cancel>
                </div>
            </div>

        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // const isForeignSelect = document.getElementById('is_foreign');
            //console.log("Script loaded");
            const has_insurer_preference = document.querySelector('[name="has_insurer_preference"]');

            //console.log(has_insurer_preference.value);

            const preferred_insurer = document.querySelector('[name="preferred_insurer_block"]');
            // const rnmField = document.getElementById('rnm_field');

            function has_insurer_toggleFields() {
                if (has_insurer_preference.value === '1') {
                    preferred_insurer.classList.remove('hidden');
                } else {
                    preferred_insurer.classList.add('hidden');
                }
            }

            has_insurer_preference.addEventListener('change', has_insurer_toggleFields);
            has_insurer_toggleFields(); // Executa na carga inicial

            const insurance_type = document.querySelector('[name="insurance_type"]');
            const renov_block = document.querySelector('[name="renov_block"]');


            function insurance_type_toggleFields() {
                if (insurance_type.value === '1') {
                    renov_block.classList.remove('hidden');
                } else {
                    renov_block.classList.add('hidden');
                }
            }

            insurance_type.addEventListener('change', insurance_type_toggleFields);

            insurance_type_toggleFields();

        });
    </script>

</x-app-layout>
