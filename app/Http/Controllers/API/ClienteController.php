<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Company;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:clientes|max:255',
            'email' => 'required|string|email|unique:clientes|max:255',
            'phone' => 'string|nullable',
            'website' => 'string|nullable',

            // Address validation rules
            'address.street' => 'required|string|max:255',
            'address.suite' => 'nullable|string|max:255',
            'address.city' => 'required|string|max:255',
            'address.zipcode' => 'required|string|max:255',

            // Optional validation for geo data (if required)
            'address.lat' => 'nullable|numeric|between:-90,90',  // Latitude range
            'address.lng' => 'nullable|numeric|between:-180,180', // Longitude range

            // Company validation rules
            'company.name' => 'nullable|string|max:255',
            'company.catchPhrase' => 'nullable|string|max:255',
            'company.bs' => 'nullable|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $request->all();
        $companyData = $data['company'];
        $addressData = $data['address'];

        // Create Cliente model with nested data relationships
        $datosCliente = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'website' => $data['website'],
        ];

        $cliente = Cliente::create($datosCliente);

        if($companyData){
            $companyData['cliente_id'] = $cliente->id;
            $datosCliente['company'] = Company::create($companyData); // Create Company
        }

        if($addressData){
            $addressData['cliente_id'] = $cliente->id;

            if(isset($addressData['geo']) && $addressData['geo']){
                $addressData['lat'] = $addressData['geo']['lat'];
                $addressData['lng'] = $addressData['geo']['lng'];
                unset($addressData['geo']);
            }

            $datosCliente['address'] = Address::create($addressData); // Create Address
        }

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'username' => 'string|unique:clientes,username,' . $id . '|max:255',
            'email' => 'string|email|unique:clientes,email,' . $id . '|max:255',
            'phone' => 'string|nullable',
            'website' => 'string|nullable',

            // Address validation rules
            'address.street' => 'required|string|max:255',
            'address.suite' => 'nullable|string|max:255',
            'address.city' => 'required|string|max:255',
            'address.zipcode' => 'required|string|max:255',

            // Optional validation for geo data (if required)
            'address.lat' => 'nullable|numeric|between:-90,90',  // Latitude range
            'address.lng' => 'nullable|numeric|between:-180,180', // Longitude range

            // Company validation rules
            'company.name' => 'nullable|string|max:255',
            'company.catchPhrase' => 'nullable|string|max:255',
            'company.bs' => 'nullable|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $cliente = Cliente::findOrFail($id);

        $cliente->name = $request->input('cliente.name');
        $cliente->username = $request->input('cliente.username');
        $cliente->email = $request->input('cliente.email');
        $cliente->phone = $request->input('cliente.phone');
        $cliente->website = $request->input('cliente.website');

        $cliente->save();

        $company = Company::where('cliente_id', $id)->first();

        $company->name = $request->input('company.name');
        $company->catchPhrase = $request->input('company.catchPhrase');
        $company->bs = $request->input('company.bs');

        $company->save();

        $address = Address::where('cliente_id', $id)->first();

        $address->street = $request->input('address.street');
        $address->suite = $request->input('address.suite');
        $address->city = $request->input('address.city');
        $address->zipcode = $request->input('address.zipcode');

        $address->save();

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->address = Address::where('cliente_id',  (int)$cliente->id)->get();
        $cliente->company = Company::where('cliente_id',  (int)$cliente->id)->get();

        // Eliminar companies asociadas
        foreach ($cliente->companies as $company) {
            $company->delete();
        }

        // Eliminar addresses asociadas
        foreach ($cliente->addresses as $address) {
            $address->delete();
        }

        $cliente->delete();
        return response()->json(null, 204);
    }
}
