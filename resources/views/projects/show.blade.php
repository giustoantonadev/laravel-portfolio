@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card bg-dark text-light border-0 shadow-lg">

                <div class="card-body">

                    {{-- TITLE --}}
                    <h1 class="fw-bold mb-4">{{ $project->title }}</h1>

                    {{-- IMAGE --}}
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"
                             alt="{{ $project->title }}"
                             class="img-fluid rounded mb-4 shadow">
                    @endif

                    {{-- TYPE --}}
                    <p class="mb-2">
                        <strong>Type:</strong>
                        {{ $project->type ? $project->type->name : 'None' }}
                    </p>

                    {{-- SLUG --}}
                    <p class="mb-2">
                        <strong>Slug:</strong>
                        {{ $project->slug }}
                    </p>

                    {{-- DESCRIPTION --}}
                    <p class="text-muted mb-4">{{ $project->description }}</p>

                    {{-- TECHNOLOGIES --}}
                    <h4 class="mb-3">Technologies</h4>

                    @if($project->technologies->isEmpty())
                        <p class="text-muted">No technologies assigned.</p>
                    @else
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            @foreach($project->technologies as $tech)
                                <span class="tech-badge"
                                      style="--color: {{ $tech->color }}">
                                    <i class="{{ $tech->icon }}"></i>
                                    {{ $tech->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- BACK BUTTON --}}
                    <a href="{{ route('projects.index') }}"
                       class="btn btn-outline-light btn-sm px-4">
                        Back
                    </a>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
