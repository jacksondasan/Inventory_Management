@extends('layouts.app')

@section('content')
<h2 id="warehouses">Warehouses</h2>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warehouses as $warehouse)
        <tr>
            <td>{{ $warehouse->name }}</td>
            <td>{{ $warehouse->location }}</td>
            <td>
                <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('warehouses.create') }}" class="btn btn-success">Add New Warehouse</a>
@endsection
