@extends('layouts.app')

@section('content')
<h2>Edit Supplier</h2>

<!-- Display success message if available -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="contact_information" class="form-label">Contact Information</label>
        <input type="text" class="form-control" id="contact_information" name="contact_information" value="{{ old('contact_information', $supplier->contact_information) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Supplier</button>
</form>

<a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">Back to Suppliers</a>
@endsection
