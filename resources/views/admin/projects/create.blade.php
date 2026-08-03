@extends('layouts.admin')

@section('content')

<h1>Create new project</h1>

<form action="{{ route('admin.projects.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Tipo</label>
        <select name="type_id" id="type_id" class="form-select">
            <option value="">-- Seleziona un tipo --</option>

            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @foreach($technologies as $tech)
    <div class="form-check">
        <input
            class="form-check-input"
            type="checkbox"
            name="technologies[]"
            value="{{ $tech->id }}"
            {{ in_array($tech->id, old('technologies', $project->technologies->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
        <label class="form-check-label">
            {{ $tech->name }}
        </label>
    </div>
    @endforeach


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary">Create project</button>
</form>

@endsection