@extends('layouts.app')

@section('content')
<h2 id="products">Products</h2>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>SKU</th>
            <th>Quantity in Stock</th>
            <th>Supplier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->quantity_in_stock }}</td>
            <td>{{ $product->supplier->name }}</td>
            <td>
                <!-- Edit Button Form -->
                <form action="{{ route('products.edit', $product->id) }}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </form>
                
                <!-- Delete Button Form -->
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
@endsection
