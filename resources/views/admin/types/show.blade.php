@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Type Details</h1>

    <p><strong>ID:</strong> {{ $type->id }}</p>
    <p><strong>Name:</strong> {{ $type->name }}</p>

    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
