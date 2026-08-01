@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Types</h1>

    <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">New Type</a>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.types.show', $type) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
