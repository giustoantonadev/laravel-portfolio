@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
<div class="container py-4">

    <h1 class="text-light mb-4">Create New Project</h1>

    <div class="card bg-dark text-light border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control bg-dark text-light @error('title') is-invalid @enderror"
                           value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              rows="5"
                              class="form-control bg-dark text-light @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TYPE --}}
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type_id"
                            class="form-select bg-dark text-light @error('type_id') is-invalid @enderror">
                        <option value="">No type</option>

                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TECHNOLOGIES (modern checkboxes) --}}
                <div class="mb-3">
                    <label class="form-label">Technologies</label>

                    <div class="d-flex flex-wrap gap-2">

                        @foreach ($technologies as $tech)
                            <label for="tech{{ $tech->id }}"
                                   class="p-2 rounded d-flex align-items-center gap-2"
                                   style="background-color: {{ $tech->color }}; cursor:pointer;">

                                <input type="checkbox"
                                       id="tech{{ $tech->id }}"
                                       name="technologies[]"
                                       value="{{ $tech->id }}"
                                       class="form-check-input"
                                       {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>

                                <i class="{{ $tech->icon }}"></i>
                                <span class="fw-bold">{{ $tech->name }}</span>
                            </label>
                        @endforeach

                    </div>

                    @error('technologies')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-success">Create Project</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
