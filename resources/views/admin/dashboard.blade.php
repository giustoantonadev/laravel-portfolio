@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Dashboard Admin</h1>
            <p class="text-muted">Gestione generale dei contenuti del portfolio</p>
        </div>
    </div>

    {{-- KPI CARDS --}}
    <div class="row g-4">

        {{-- Progetti Totali --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-dark text-light">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-folder-fill fs-2 me-3 text-primary"></i>
                        <h5 class="card-title mb-0">Progetti Totali</h5>
                    </div>
                    <p class="display-5 fw-bold">{{ \App\Models\Project::count() }}</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary btn-sm">Vai ai progetti</a>
                </div>
            </div>
        </div>

        {{-- Ultimo Progetto --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-secondary text-light">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-clock-history fs-2 me-3 text-warning"></i>
                        <h5 class="card-title mb-0">Ultimo Progetto Creato</h5>
                    </div>

                    @php
                        $last = \App\Models\Project::latest()->first();
                    @endphp

                    @if($last)
                        <p class="fw-bold">{{ $last->title }}</p>
                        <a href="{{ route('projects.show', $last) }}" class="btn btn-outline-light btn-sm">
                            Vedi progetto
                        </a>
                    @else
                        <p>Nessun progetto presente.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Azioni Rapide --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-primary text-light">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-lightning-charge-fill fs-2 me-3 text-light"></i>
                        <h5 class="card-title mb-0">Azioni Rapide</h5>
                    </div>

                    <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm mb-2 w-100">
                        Gestisci Progetti
                    </a>

                    <button class="btn btn-outline-light btn-sm w-100" disabled>
                        Aggiungi Progetto (prossima lezione)
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- ATTIVITÀ RECENTI --}}
    <div class="card bg-dark text-light mt-5 shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3">
                <i class="bi bi-list-check me-2"></i>Attività Recenti
            </h4>

            @php
                $recent = \App\Models\Project::latest()->take(5)->get();
            @endphp

            @if($recent->count())
                <ul class="list-group list-group-flush">
                    @foreach($recent as $proj)
                        <li class="list-group-item bg-dark text-light d-flex justify-content-between">
                            <span>{{ $proj->title }}</span>
                            <small class="text-muted">{{ $proj->created_at->diffForHumans() }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Nessuna attività recente.</p>
            @endif
        </div>
    </div>

    {{-- INTRO --}}
    <div class="card bg-secondary text-light mt-4 shadow-sm border-0">
        <div class="card-body">
            <h4>Benvenuto nel tuo Back‑Office</h4>
            <p>
                Gestisci i contenuti del tuo portfolio in modo semplice e veloce.
                Inizia dalla sezione <strong>Progetti</strong> per visualizzare i dati già presenti nel database.
            </p>
            <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">Vai ai Progetti</a>
        </div>
    </div>

</div>
@endsection
