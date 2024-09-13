<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Get all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Show the form for creating a new supplier
    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'contact_information' => 'required|string|max:255',
    ]);

    // Create the new supplier
    Supplier::create($request->only(['name', 'contact_information']));

    // Redirect to the suppliers index page with a success message
    return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
}

    // Show a single supplier
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    // Show the form for editing a supplier
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
{
    $supplier = Supplier::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'contact_information' => 'required|string|max:255',
    ]);

    $supplier->update($request->only(['name', 'contact_information']));

    // Redirect to the suppliers index page
    return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
}
    // Delete a supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
