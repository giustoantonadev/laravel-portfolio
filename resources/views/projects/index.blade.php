@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">Projects</h1>

    <div class="row g-4">
        @foreach ($projects as $project)
        <div class="col-md-4">
            <div class="card bg-dark text-light shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($project->description, 80) }}</p>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-light btn-sm">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection