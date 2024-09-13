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

    // Create a new supplier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
        ]);

        return Supplier::create($request->all());
    }

    // Show a single supplier
    public function show($id)
    {
        return Supplier::findOrFail($id);
    }

    // Update supplier details
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());
        return $supplier;
    }

    // Delete a supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted']);
    }
}
