<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Product;

class StockTransferController extends Controller
{
    // Show stock transfer form
    public function showStockTransferForm()
    {
        $warehouses = Warehouse::all();
        $products = Product::all();
        return view('stock-transfer.index', compact('warehouses', 'products'));
    }

    // Handle stock transfer
    public function transferStock(Request $request)
    {
        $request->validate([
            'from_warehouse' => 'required|exists:warehouses,id',
            'to_warehouse' => 'required|exists:warehouses,id|different:from_warehouse',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $fromWarehouse = Warehouse::findOrFail($request->from_warehouse);
        $toWarehouse = Warehouse::findOrFail($request->to_warehouse);
        $product = Product::findOrFail($request->product_id);

        // Check if the source warehouse has enough stock
        if ($fromWarehouse->products()->where('product_id', $product->id)->first()->pivot->quantity_in_stock < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough stock in the source warehouse');
        }

        // Decrease stock from source warehouse
        $fromWarehouse->products()->updateExistingPivot($product->id, [
            'quantity_in_stock' => $fromWarehouse->products()->where('product_id', $product->id)->first()->pivot->quantity_in_stock - $request->quantity
        ]);

        // Increase stock in the destination warehouse
        if ($toWarehouse->products()->where('product_id', $product->id)->exists()) {
            $toWarehouse->products()->updateExistingPivot($product->id, [
                'quantity_in_stock' => $toWarehouse->products()->where('product_id', $product->id)->first()->pivot->quantity_in_stock + $request->quantity
            ]);
        } else {
            $toWarehouse->products()->attach($product->id, ['quantity_in_stock' => $request->quantity]);
        }

        return redirect()->route('transfer-stock-form')->with('success', 'Stock transferred successfully');
    }
}
