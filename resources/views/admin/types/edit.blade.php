@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Type</h1>

    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $type->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
