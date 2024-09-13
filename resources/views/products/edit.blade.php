@extends('layouts.app')

@section('content')
<h2>Edit Product</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" required>
    </div>

    <div class="form-group">
        <label for="quantity_in_stock">Quantity in Stock:</label>
        <input type="number" id="quantity_in_stock" name="quantity_in_stock" class="form-control" value="{{ old('quantity_in_stock', $product->quantity_in_stock) }}" required>
    </div>

    <div class="form-group">
        <label for="supplier_id">Supplier:</label>
        <select id="supplier_id" name="supplier_id" class="form-control" required>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $supplier->id == old('supplier_id', $product->supplier_id) ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
@endsection
