<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Customer;

class QuotationController extends Controller
{
    public function index()
    {
        Log::info('Quotation index');
        // $quotations = Quotation::all();
        $quotations = Quotation::with('customer')->get();
        return view('quotation.list', compact('quotations'));
    }

    public function create($CustomerId, Request $request)
    {
        Log::info('Quotation create');

        $referer = $request->headers->get('referer');
        session(['previous_url' => $referer]);
        $customer = Customer::findOrFail($CustomerId);
        $quotation = new Quotation(); // instancia vazia para o form

        Log::info('Quotation create');
        return view('quotation.create', compact('customer', 'quotation'));
    }

    public function store(Request $request)
    {
        Log::info('Quotation store');

        $validated = $request->validate(
            $this->rules($request),
            $this->messages(),
            $this->attributes()
        );

        Quotation::create($validated);

        return redirect()->route('customer.list')->with('success', 'Cotação criada com sucesso!');
    }

    public function show(Quotation $quotation)
    {
        return view('quotation.show', compact('quotation'));
    }

    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('quotation.edit', compact('quotation'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Quotation update');


        $quotation = Quotation::findOrFail($id);

        $request->validate(
            $this->rules($request, $id),
            $this->messages(),
            $this->attributes()
        );

        $quotation->customer_id = $request->input('customer_id');

        $quotation->request_date = $request->input('request_date');
        $quotation->insurance_type = $request->input('insurance_type');
        $quotation->bonus_class = $request->input('bonus_class');
        $quotation->has_claims = $request->input('has_claims');
        $quotation->vehicle_plate = $request->input('vehicle_plate');
        $quotation->vehicle_chassis = $request->input('vehicle_chassis');
        $quotation->vehicle_brand = $request->input('vehicle_brand');
        $quotation->vehicle_model = $request->input('vehicle_model');
        $quotation->manufacture_year = $request->input('manufacture_year');
        $quotation->overnight_zipcode = $request->input('overnight_zipcode');
        $quotation->driver_age = $request->input('driver_age');
        $quotation->license_time = $request->input('license_time');

        $quotation->has_insurer_preference = $request->input('has_insurer_preference');
        $quotation->preferred_insurer = $request->input('preferred_insurer');


        $quotation->save();

        return redirect()->route('quotation.list')->with('success', 'Cotação atualizada com sucesso!');
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->delete();
        return redirect()->route('quotation.list')->with('success', 'Cotação excluída com sucesso!');
    }

    public function deactivate($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->active = false;
        $quotation->save();

        return redirect()->route('quotation.list')->with('success', 'Cotação desativada com sucesso!');
    }

    public function activate($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->active = true;
        $quotation->save();

        return redirect()->route('quotation.list')->with('success', 'Cotação reativada com sucesso!');
    }

    protected function rules(Request $request, $id = null)
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'request_date' => ['required', 'date'],
            'insurance_type' => ['required', Rule::in(['0', '1'])],
            'bonus_class' => [
                Rule::requiredIf($request->insurance_type === '1'),
                'nullable',
                'string',
                'max:255',
            ],
            'has_claims' => [
                Rule::requiredIf($request->insurance_type === '1'),
                'nullable',
                Rule::in(['0', '1']),
            ],
            'vehicle_plate' => ['required', 'string', 'max:10'],
            'vehicle_chassis' => ['required', 'string', 'max:50'],
            'vehicle_brand' => ['required', 'string', 'max:255'],
            'vehicle_model' => ['required', 'string', 'max:255'],
            'manufacture_year' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'overnight_zipcode' => ['required', 'string', 'size:8'],
            'driver_age' => ['required', 'integer', 'min:18', 'max:100'],
            'license_time' => ['required', 'string', 'max:255'],
            'coverages' => ['nullable', 'string', 'max:1000'],
            'has_insurer_preference' => ['required', Rule::in(['0', '1'])],
            'preferred_insurer' => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function attributes()
    {
        return [
            'customer_id' => 'Cliente',
            'request_date' => 'Data da Solicitação',
            'insurance_type' => 'Tipo de Seguro',
            'bonus_class' => 'Classe de Bônus',
            'has_claims' => 'Houve Sinistros',
            'vehicle_plate' => 'Placa',
            'vehicle_chassis' => 'Chassi',
            'vehicle_brand' => 'Marca',
            'vehicle_model' => 'Modelo',
            'manufacture_year' => 'Ano',
            'overnight_zipcode' => 'CEP de Pernoite',
            'driver_age' => 'Idade do Condutor',
            'license_time' => 'Tempo de Habilitação',
            'coverages' => 'Coberturas Desejadas',
            'has_insurer_preference' => 'Tem Seguradora Preferida',
            'preferred_insurer' => 'Seguradora Preferida',
        ];
    }

    protected function messages()
    {
        return [
            'bonus_class.required' => 'A Classe de Bônus é obrigatória para renovações.',
            'has_claims.required' => 'Você deve informar se houve sinistros em caso de renovação.',
        ];
    }
}
