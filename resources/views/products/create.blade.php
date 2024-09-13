@extends('layouts.app')

@section('content')
<h2>Create New Product</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="quantity_in_stock">Quantity in Stock:</label>
        <input type="number" name="quantity_in_stock" id="quantity_in_stock" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="supplier_id">Supplier:</label>
        <select name="supplier_id" id="supplier_id" class="form-control" required>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Product</button>
</form>
@endsection
