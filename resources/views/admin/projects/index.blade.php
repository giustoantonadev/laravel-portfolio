@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Projects</h1>

    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
        + Add New Project
    </a>
</div>

<div class="card bg-dark text-light border-0 shadow-sm">
    <div class="card-body">

        <table class="table table-dark table-striped align-middle mb-0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Technologies</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>

            <td>{{ $project->type ? $project->type->name : 'None' }}</td>

            {{-- TECHNOLOGIES --}}
            <td>
                @if($project->technologies->isEmpty())
                    <span class="text-muted">None</span>
                @else
                    <div class="d-flex flex-wrap gap-1">
                        @foreach($project->technologies as $tech)
                            <span class="badge"
                                  style="background-color: {{ $tech->color }} !important;">
                                {{ $tech->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </td>

            <td class="d-flex gap-2">

                <a href="{{ route('admin.projects.show', $project) }}"
                   class="btn btn-sm btn-primary">
                    View
                </a>

                <a href="{{ route('admin.projects.edit', $project) }}"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>

                <button
                    type="button"
                    class="btn btn-sm btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal"
                    data-project-title="{{ $project->title }}"
                    data-delete-url="{{ route('admin.projects.destroy', $project) }}">
                    Delete
                </button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


    </div>
</div>

{{-- PAGINATION --}}
<div class="mt-4">
    {{ $projects->links() }}
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
