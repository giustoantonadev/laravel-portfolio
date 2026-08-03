@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<div class="container py-4">

    <h1 class="text-light mb-4">{{ $project->title }}</h1>

    <div class="card bg-dark text-light border-0 shadow-sm mb-4">
        <div class="card-body">

            {{-- IMAGE --}}
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}"
                     alt="{{ $project->title }}"
                     class="img-fluid rounded mb-4">
            @endif

            {{-- SLUG --}}
            <p class="mb-2">
                <strong>Slug:</strong> {{ $project->slug }}
            </p>

            {{-- TYPE --}}
            <p class="mb-2">
                <strong>Type:</strong>
                {{ $project->type ? $project->type->name : 'None' }}
            </p>

            {{-- DESCRIPTION --}}
            <p class="mb-4">
                <strong>Description:</strong><br>
                {{ $project->description }}
            </p>

            {{-- TECHNOLOGIES --}}
            <h5 class="mb-2">Technologies</h5>

            @if($project->technologies->isEmpty())
                <p class="text-muted">No technologies assigned.</p>
            @else
                <div class="d-flex flex-wrap gap-2">
                    @foreach($project->technologies as $tech)
                        <span class="badge"
                              style="background-color: {{ $tech->color }} !important;
                                     padding: 8px 12px;
                                     font-size: 0.9rem;">
                            <i class="{{ $tech->icon }}"></i>
                            {{ $tech->name }}
                        </span>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    {{-- BUTTONS --}}
    <div class="d-flex gap-2">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back</a>

        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Edit</a>

        <button
            type="button"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#deleteModal"
            data-project-title="{{ $project->title }}"
            data-delete-url="{{ route('admin.projects.destroy', $project) }}">
            Delete
        </button>
    </div>

</div>

{{-- DELETE MODAL --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">

            <div class="modal-header border-secondary">
                <h5 class="modal-title">Confirm deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete:</p>
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

@section('scripts')
<script>
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;

        const title = button.getAttribute('data-project-title');
        const url = button.getAttribute('data-delete-url');

        document.getElementById('modalProjectTitle').textContent = title;

        const form = document.getElementById('deleteForm');
        form.action = url;
    });
</script>
@endsection
