<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\AddressRequest;

/**
 * Class AddressController
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::paginate();

        return view('address.index', compact('addresses'))
            ->with('i', (request()->input('page', 1) - 1) * $addresses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = new Address();
        return view('address.create', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        Address::create($request->validated());

        return redirect()->route('addresses.index')
            ->with('success', 'Address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $address = Address::find($id);

        return view('address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $address = Address::find($id);

        return view('address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->validated());

        return redirect()->route('addresses.index')
            ->with('success', 'Address updated successfully');
    }

    public function destroy($id)
    {
        Address::find($id)->delete();

        return redirect()->route('addresses.index')
            ->with('success', 'Address deleted successfully');
    }
}
