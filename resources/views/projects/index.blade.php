@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="text-light fw-bold mb-4">Projects</h1>

    <div class="row g-4">

        @foreach($projects as $project)
        <div class="col-md-6 col-lg-4">

            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none">

                <div class="project-card shadow-lg">

                    {{-- IMAGE --}}
                    @if($project->image)
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $project->image) }}"
                                 alt="{{ $project->title }}"
                                 class="img-fluid">
                        </div>
                    @endif

                    <div class="p-3">

                        {{-- TITLE --}}
                        <h4 class="project-title fw-bold">{{ $project->title }}</h4>

                        {{-- TYPE --}}
                        <p class="project-type mb-2">
                            {{ $project->type ? $project->type->name : 'No type' }}
                        </p>

                        {{-- TECHNOLOGIES --}}
                        @if($project->technologies->isNotEmpty())
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach($project->technologies as $tech)
                                    <span class="tech-badge"
                                          style="--color: {{ $tech->color }}">
                                        <i class="{{ $tech->icon }}"></i>
                                        {{ $tech->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>

            </a>

        </div>
        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="custom-pagination">

        @if ($projects->onFirstPage())
            <span class="page-btn disabled">Prev</span>
        @else
            <a href="{{ $projects->previousPageUrl() }}" class="page-btn">Prev</a>
        @endif

        <span class="page-number">
            Page {{ $projects->currentPage() }} of {{ $projects->lastPage() }}
        </span>

        @if ($projects->hasMorePages())
            <a href="{{ $projects->nextPageUrl() }}" class="page-btn">Next</a>
        @else
            <span class="page-btn disabled">Next</span>
        @endif

    </div>

</div>
@endsection
