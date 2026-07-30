@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<h1 class="mb-4">{{ $project->title }}</h1>

<p><strong>Tipologia:</strong> {{ $project->type }}</p>


<div class="card bg-secondary text-light">
    <div class="card-body">

        <p><strong>Slug:</strong> {{ $project->slug }}</p>

        <p><strong>Descrizione:</strong></p>
        <p>{{ $project->description }}</p>

        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid mt-3">
        @endif
    </div>
    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button
            type="button"
            class="btn btn-sm btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteModal"
            data-project-title="{{ $project->title }}"
            data-project-id="{{ $project->id }}">
            Elimina
        </button>
    </form>
</div>

<a href="{{ route('admin.projects.index') }}" class="btn btn-outline-light mt-3">
    Torna alla lista
</a>

<!-- MODALE DELETE -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">

            <div class="modal-header border-secondary">
                <h5 class="modal-title">Conferma eliminazione</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Vuoi davvero eliminare il progetto:</p>
                <h4 id="modalProjectTitle" class="text-warning"></h4>
            </div>

            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection