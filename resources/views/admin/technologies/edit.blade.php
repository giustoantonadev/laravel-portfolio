@extends('layouts.admin')

@section('content')
<h1>{{ isset($technology) ? 'Edit Technology' : 'New Technology' }}</h1>

<form
    action="{{ isset($technology) ? route('admin.technologies.update', $technology) : route('admin.technologies.store') }}"
    method="POST">

    @csrf
    @if(isset($technology))
    @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Technology name</label>
        <input type="text" name="name" class="form-control"
            value="{{ old('name', $technology->name ?? '') }}">
    </div>

    <button class="btn btn-success">
        {{ isset($technology) ? 'Update' : 'Create' }}
    </button>
</form>
@endsection