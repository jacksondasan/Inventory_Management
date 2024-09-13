@extends('layouts.app')

@section('content')
<h2>Supplier Details</h2>

<p><strong>Name:</strong> {{ $supplier->name }}</p>
<p><strong>Contact Information:</strong> {{ $supplier->contact_information }}</p>

<a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary">Edit Supplier</a>
<form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Supplier</button>
</form>
@endsection
