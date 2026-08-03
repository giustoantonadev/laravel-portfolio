@extends('layouts.app')

@section('content')

<div class="hero-section text-light py-5" style="
    background: linear-gradient(180deg, #0d0d0d, #1a1a1a);
    min-height: 60vh;
">
    <div class="container py-5">

        <h1 class="display-4 fw-bold mb-3">
            My Portfolio
        </h1>

        <p class="lead mb-4">
            A collection of my projects, built with Laravel, Bootstrap and lots of passion.
        </p>

        <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg">
            View Projects
        </a>

    </div>
</div>

<div class="container py-5 text-light">

    <h2 class="fw-bold mb-4">Latest Projects</h2>

    @php
    $latest = \App\Models\Project::latest()->take(3)->get();
    @endphp

    <div class="row g-4">

        @foreach ($latest as $project)
        <div class="col-md-4">
            <div class="card bg-dark text-light shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($project->description, 80) }}</p>

                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-light btn-sm">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection