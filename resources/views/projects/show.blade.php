@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-dark text-light border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="fw-bold">{{ $project->title }}</h2>
                    @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid mb-3">
                    @endif
                    <p class="text-muted">{{ $project->description }}</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-light btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection