@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4 p-4 rounded-4"
         style="background: linear-gradient(135deg, #0f0f0f, #1a1a1a); box-shadow: 0 0 40px rgba(0,0,0,0.6);">
        <h1 class="fw-bold text-light mb-1">
            <i class="bi bi-speedometer2 me-2 text-info"></i>
            Admin Dashboard
        </h1>
        <p class="text-secondary">Cinematic Dark Premium Control Panel</p>
    </div>

    {{-- KPI CARDS --}}
    <div class="row g-4">

        {{-- TOTAL PROJECTS --}}
        <div class="col-md-4">
            <div class="card border-0 rounded-4"
                 style="background: #121212; box-shadow: 0 0 25px rgba(0,255,255,0.15);">
                <div class="card-body text-light">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-folder-fill fs-2 me-3 text-info"></i>
                        <h5 class="mb-0">Total Projects</h5>
                    </div>
                    <p class="display-5 fw-bold">{{ \App\Models\Project::count() }}</p>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-info btn-sm w-100">
                        Manage Projects
                    </a>
                </div>
            </div>
        </div>

        {{-- LATEST PROJECT --}}
        <div class="col-md-4">
            <div class="card border-0 rounded-4"
                 style="background: #161616; box-shadow: 0 0 25px rgba(255,200,0,0.15);">
                <div class="card-body text-light">

                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-stars fs-2 me-3 text-warning"></i>
                        <h5 class="mb-0">Latest Project</h5>
                    </div>

                    @php $last = \App\Models\Project::latest()->first(); @endphp

                    @if($last)
                        <p class="fw-bold fs-5">{{ $last->title }}</p>
                        <a href="{{ route('admin.projects.show', $last) }}"
                           class="btn btn-outline-warning btn-sm w-100">
                            View Project
                        </a>
                    @else
                        <p class="text-muted">No projects found.</p>
                    @endif

                </div>
            </div>
        </div>

        {{-- QUICK ACTIONS --}}
        <div class="col-md-4">
            <div class="card border-0 rounded-4"
                 style="background: #141414; box-shadow: 0 0 25px rgba(0,150,255,0.15);">
                <div class="card-body text-light">

                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-lightning-charge-fill fs-2 me-3 text-primary"></i>
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>

                    <a href="{{ route('admin.projects.index') }}"
                       class="btn btn-primary btn-sm mb-2 w-100">
                        Manage Projects
                    </a>

                    <a href="{{ route('admin.projects.create') }}"
                       class="btn btn-outline-light btn-sm w-100">
                        Create New Project
                    </a>

                </div>
            </div>
        </div>

    </div>

    {{-- RECENT ACTIVITY --}}
    <div class="card bg-dark text-light mt-5 border-0 rounded-4"
         style="box-shadow: 0 0 30px rgba(0,0,0,0.5);">
        <div class="card-body">

            <h4 class="mb-3">
                <i class="bi bi-activity me-2 text-info"></i>
                Recent Activity
            </h4>

            @php $recent = \App\Models\Project::latest()->take(5)->get(); @endphp

            @if($recent->count())
                <ul class="list-group list-group-flush">
                    @foreach($recent as $proj)
                        <li class="list-group-item bg-dark text-light d-flex justify-content-between"
                            style="border-bottom: 1px solid #333;">
                            <span>{{ $proj->title }}</span>
                            <small class="text-muted">{{ $proj->created_at->diffForHumans() }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No recent activity.</p>
            @endif

        </div>
    </div>

    {{-- INTRO --}}
    <div class="card bg-secondary text-light mt-4 border-0 rounded-4"
         style="box-shadow: 0 0 25px rgba(255,255,255,0.1);">
        <div class="card-body">
            <h4 class="fw-bold">Welcome to your Back‑Office</h4>
            <p class="mb-3">
                Manage your portfolio content easily and quickly.
                Start from the <strong>Projects</strong> section to view data already present in the database.
            </p>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm">Go to Projects</a>
        </div>
    </div>

</div>
@endsection
