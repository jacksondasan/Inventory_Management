<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier; // Import the Supplier model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all products
    public function index()
    {
        $products = Product::with('supplier')->get();
        return view('products.index', compact('products'));
    }

    // Show the form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all(); // Fetch all suppliers
        return view('products.edit', compact('product', 'suppliers'));
    }

    public function create()
    {
        $suppliers = Supplier::all(); // Fetch all suppliers for the dropdown
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'quantity_in_stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    // Update product details
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'quantity_in_stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
    
        $product->update($request->only(['name', 'sku', 'quantity_in_stock', 'supplier_id']));
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
