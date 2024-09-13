<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    // Get all warehouses
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));

    }
    public function create()
    {
        return view('warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Warehouse::create($request->only(['name', 'location']));

        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    
    public function show($id)
    {
        return Warehouse::findOrFail($id);
    }
    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouses.edit', compact('warehouse'));
    }


    public function update(Request $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
    
        $warehouse->update($request->only(['name', 'location']));
    
        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully.');
    }
    

    // Delete a warehouse
    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
    
        // Redirect to the warehouses index page with a success message
        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }
    
    public function transferStock(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'from_warehouse_id' => 'required|exists:warehouses,id',
        'to_warehouse_id' => 'required|exists:warehouses,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    // Implement stock transfer logic here...

    return response()->json(['message' => 'Stock transferred successfully']);
}
}
