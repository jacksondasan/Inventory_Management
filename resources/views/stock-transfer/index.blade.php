@extends('layouts.app')

@section('content')
<h2 id="stock-transfer">Stock Transfer</h2>

<form action="{{ route('transfer-stock') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select class="form-select" name="product_id" required>
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="from_warehouse_id" class="form-label">From Warehouse</label>
        <select class="form-select" name="from_warehouse_id" required>
            @foreach($warehouses as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="to_warehouse_id" class="form-label">To Warehouse</label>
        <select class="form-select" name="to_warehouse_id" required>
            @foreach($warehouses as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" required>
    </div>

    <button type="submit" class="btn btn-primary">Transfer Stock</button>
</form>
@endsection
