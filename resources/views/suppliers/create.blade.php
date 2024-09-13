@extends('layouts.app')

@section('content')
<h2>Create New Supplier</h2>

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="contact_information">Contact Information:</label>
        <input type="text" name="contact_information" id="contact_information" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Supplier</button>
</form>
@endsection
