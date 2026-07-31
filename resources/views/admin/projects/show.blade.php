@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<h1 class="mb-4">{{ $project->title }}</h1>

<p><strong>Type:</strong> {{ $project->type ? $project->type->name : 'None' }}</p>


<div class="card bg-secondary text-light">
    <div class="card-body">

        <p><strong>Slug:</strong> {{ $project->slug }}</p>

        <p><strong>Description:</strong></p>
        <p>{{ $project->description }}</p>

        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid mt-3">
        @endif
    </div>
</div>

<a href="{{ route('admin.projects.index') }}" class="btn btn-outline-light mt-3">
    Back to list
</a>
<form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline delete-form p-5 m-2">
    @csrf
    @method('DELETE')
    <button
        type="button"
        class="btn btn-sm btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deleteModal"
        data-project-title="{{ $project->title }}"
        data-project-id="{{ $project->id }}">
        Delete project
    </button>
</form>

<!-- MODALE DELETE -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">

            <div class="modal-header border-secondary">
                <h5 class="modal-title">Confirm deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete the project:</p>
                <h4 id="modalProjectTitle" class="text-warning"></h4>
            </div>

            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete permanently</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection