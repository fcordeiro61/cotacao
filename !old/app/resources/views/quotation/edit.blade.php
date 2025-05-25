<x-app-layout>
    @section('title', __('Editar Cotação'))
    @section('scroll', '')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="list-header">
        <div>
            <h3>{{ __('Editar Cotação') }}</h3>
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
        <form name="formQuotation" method="POST" action="{{ route('quotation.update', $quotation->id) }}"
            style="display: contents;">
            @csrf
            @method('PUT')

            @include('quotation.form-fields', ['quotation' => $quotation])

            <div class="button-container">
                <div class="list-detail flex justify-end space-x-3">
                    <x-primary-button>{{ __('Salvar Cotação') }}</x-primary-button>


                    <x-button-cancel onclick="window.location='{{ route('quotation.list') }}'">
                        <i class="fa fa-arrow-left"></i>&nbsp;{{ __('Cancelar') }}
                    </x-button-cancel>
                </div>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const has_insurer_preference = document.querySelector('[name="has_insurer_preference"]');
            const preferred_insurer = document.querySelector('[name="preferred_insurer_block"]');

            function toggleInsurerField() {
                preferred_insurer.classList.toggle('hidden', has_insurer_preference.value !== '1');
            }

            has_insurer_preference.addEventListener('change', toggleInsurerField);
            toggleInsurerField();

            const insurance_type = document.querySelector('[name="insurance_type"]');
            const renov_block = document.querySelector('[name="renov_block"]');

            function toggleRenovFields() {
                renov_block.classList.toggle('hidden', insurance_type.value !== '1');
            }

            insurance_type.addEventListener('change', toggleRenovFields);
            toggleRenovFields();
        });
    </script>
</x-app-layout>
