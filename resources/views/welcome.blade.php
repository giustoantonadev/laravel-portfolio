@extends('layouts.app')

@section('content')

<div class="hero-section text-light py-5" style="
    background: linear-gradient(180deg, #0d0d0d, #1a1a1a);
    min-height: 60vh;
">
    <div class="container py-5">

        <h1 class="display-4 fw-bold mb-3">
            Il Mio Portfolio
        </h1>

        <p class="lead mb-4">
            Una raccolta dei miei progetti, sviluppati con Laravel, Bootstrap e tanta passione.
        </p>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg">
            Guarda i Progetti
        </a>

    </div>
</div>

<div class="container py-5 text-light">

    <h2 class="fw-bold mb-4">Ultimi Progetti</h2>

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

                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-outline-light btn-sm">
                            Scopri di più
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>

@endsection
