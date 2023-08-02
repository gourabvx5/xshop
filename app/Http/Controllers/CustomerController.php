<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
{
    $customers = Customer::all();
    return view('customers.index', compact('customers'));
}

public function create()
{
    return view('customers.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers',
        'contact_number' => 'required',
        'other_information' => 'nullable',
    ]);

    Customer::create($validatedData);

    return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
}

public function edit(Customer $customer)
{
    return view('customers.edit', compact('customer'));
}

public function update(Request $request, Customer $customer)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers,email,' . $customer->id,
        'contact_number' => 'required',
        'other_information' => 'nullable',
    ]);

    $customer->update($validatedData);

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
}

public function destroy(Customer $customer)
{
    $customer->delete();

    return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
}
}
