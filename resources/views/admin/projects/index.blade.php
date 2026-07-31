@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<h1 class="mb-4">Project List</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->type ? $project->type->name : 'None' }}</td>
            <td>{{ $project->slug }}</td>

            <td>
                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-primary">
                    View
                </a>

                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>

                <!-- Bottone che apre la modale -->
                <button
                    type="button"
                    class="btn btn-sm btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal"
                    data-project-title="{{ $project->title }}"
                    data-project-id="{{ $project->id }}"
                    data-delete-url="{{ route('admin.projects.destroy', $project) }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<a href="{{ route('admin.projects.create') }}" class="btn btn-success">Create new project</a>

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

                <!-- Form DELETE vera -->
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

    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;

            const projectId = button.getAttribute('data-project-id');
            const projectTitle = button.getAttribute('data-project-title');
            const deleteUrl = button.getAttribute('data-delete-url');

            document.getElementById('modalProjectTitle').textContent = projectTitle;

            const form = document.getElementById('deleteForm');
            const action = deleteUrl || `/admin/projects/${projectId}`;
            form.action = action;
            console.log('[delete modal] set form action to', action);

            form.addEventListener('submit', e => {
                console.log('[delete form] submitting to', form.action);
            }, {
                once: true
            });
        });
    } else {
        console.warn('Delete modal element not found');
    }
</script>
@endsection