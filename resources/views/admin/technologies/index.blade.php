@extends('layouts.admin')

@section('content')
<h1>Technologies</h1>

<a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">New Technology</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($technologies as $tech)
        <tr>
            <td>{{ $tech->id }}</td>
            <td>{{ $tech->name }}</td>
            <td>
                <a href="{{ route('admin.technologies.edit', $tech) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection