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
                $addressData['lng'] = $addressData['geo']['lat'];
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
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(null, 204);
    }
}
