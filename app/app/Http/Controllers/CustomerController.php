<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Customer index');
        //$users = User::all();
        $customers = Customer::all();
        return view('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Customer create');
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('Customer store');

        //dd($request->all());

        //Log::info($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'is_foreign' => 'required|boolean',

            'cpf' => 'required_if:is_foreign,false',   // valida CPF caso não seja estrangeiro |cpf',
            'rnm' => 'required_if:is_foreign,true', // valida RNM caso seja estrangeiro
            'birth_date' => 'required|date',
            'zip_code' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        Log::info($validated);
        
        //dd($validated);

        Customer::create($validated);

        return redirect()->route('customer.list')->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Log::info('customer update');
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            //'email' => 'required|email|unique:customers,email',
            'email' => 'required|email|unique:customers,email,' . $id, 
            'is_foreign' => 'required|boolean',
            'cpf' => 'required_if:is_foreign,false', // |cpf
            'rnm' => 'required_if:is_foreign,true',
            'birth_date' => 'required|date',
            'zip_code' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        $customer = Customer::findOrFail($id);

        //$user->name = $request->input('name');

        $customer->name = $request->input('name');
        
        $customer->email = $request->input('email'); 
        $customer->is_foreign = $request->input('is_foreign');
        $customer->cpf = $request->input('cpf'); 
        $customer->rnm = $request->input('rnm');
        $customer->birth_date = $request->input('birth_date');
        $customer->zip_code = $request->input('zip_code');
        $customer->street = $request->input('street');
        $customer->number = $request->input('number');
        $customer->complement = $request->input('complement');
        $customer->district = $request->input('district');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');

        $customer->save();

        return redirect()->route('customer.list')->with('success', 'Cliente atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //   {
        $customer->delete();
        return redirect()->route('customers.list')->with('success', 'Cliente deletado com sucesso!');
    }
    public function deactivate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->active = false;
        $customer->save();
    
        return redirect()->route('customer.list')->with('success', 'Usuário desativado com sucesso!');
    }   

    public function activate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->active = true;
        $customer->save();

        return redirect()->route('customer.list')->with('success', 'Usuário reativado com sucesso!');    
    }
}
