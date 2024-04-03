<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Address;
use App\Http\Requests\ClienteRequest;
use App\Models\Company;
use Inertia\Inertia;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::get();

        foreach ($clientes as &$cliente) {
            $cliente->address = Address::where('cliente_id',  (int)$cliente->id)->get();
            $cliente->company = Company::where('cliente_id',  (int)$cliente->id)->get();
        }

        return Inertia::render('Clientes/Index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        $cliente->company = new \App\Models\Company; // Replace with your company model path
        $cliente->address = new \App\Models\Address; // Replace with your company model path

        return Inertia::render('Clientes/Create', compact('cliente'));
        //return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create($request->validated());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        $cliente->company = Company::where('cliente_id',  (int)$cliente->id)->get();
        $cliente->address = Address::where('cliente_id',  (int)$cliente->id)->get();

        return Inertia::render('Clientes/Show', compact('cliente'));
    }

    public function createapi()
    {
        return Inertia::render('Clientes/CreateApi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        $cliente->company = Company::where('cliente_id',  (int)$cliente->id)->first();
        $cliente->address = Address::where('cliente_id',  (int)$cliente->id)->first();

        return Inertia::render('Clientes/Edit', compact('cliente'));
        //return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    public function destroy($id)
    {
        Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
