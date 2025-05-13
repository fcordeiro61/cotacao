<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Customer;

class QuotationController extends Controller
{
    public function index()
    {
        Log::info('Quotation index');
        $quotations = Quotation::all();
        return view('quotation.list', compact('quotations'));
    }

    public function create($CustomerId, Request $request)
    {
        Log::info('Quotation create');

        $referer = $request->headers->get('referer');
        session(['previous_url' => $referer]);
        $customer = Customer::findOrFail($CustomerId);
     
        Log::info('Quotation create');
        return view('quotation.create', compact('customer'));
    }

    public function store($CustomerId, Request $request)
    {
        Log::info('Quotation store');

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,approved,rejected',
            'valid_until' => 'required|date|after:today',
        ]);

        Quotation::create($validated);

        return redirect()->route('quotation.list')->with('success', 'Cotação criada com sucesso!');
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

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,approved,rejected',
            'valid_until' => 'required|date|after:today',
        ]);

        $quotation = Quotation::findOrFail($id);

        $quotation->customer_id = $request->input('customer_id');
        $quotation->product = $request->input('product');
        $quotation->value = $request->input('value');
        $quotation->status = $request->input('status');
        $quotation->valid_until = $request->input('valid_until');

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
}

