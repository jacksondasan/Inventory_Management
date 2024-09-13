@extends('layouts.app')

@section('content')
<h2>Edit Warehouse</h2>

<!-- Display success message if available -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $warehouse->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $warehouse->location) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Warehouse</button>
</form>

<a href="{{ route('warehouses.index') }}" class="btn btn-secondary mt-3">Back to Warehouses</a>
@endsection
