@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Create Type</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
