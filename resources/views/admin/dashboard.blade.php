@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">

    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- CARD STATISTICHE --}}
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card bg-secondary text-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Progetti Totali</h5>
                    <p class="display-6">{{ \App\Models\Project::count() }}</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">Vai ai progetti</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark text-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Ultimo Progetto Creato</h5>
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

        <div class="col-md-4">
            <div class="card bg-primary text-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Azioni Rapide</h5>
                    <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm mb-2 w-100">
                        Gestisci Progetti
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm w-100 disabled">
                        Aggiungi Progetto (prossima lezione)
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- SEZIONE INTRO --}}
    <div class="card bg-dark text-light mt-5 shadow-sm">
        <div class="card-body">
            <h4>Benvenuto nel tuo Back‑Office</h4>
            <p>
                Da questa dashboard puoi gestire i contenuti del tuo portfolio:
                progetti, immagini, descrizioni e tutte le sezioni del sito.
            </p>
            <p class="mb-0">
                Inizia dalla sezione <strong>Progetti</strong> per visualizzare i dati già presenti nel database.
            </p>
        </div>
    </div>

</div>
@endsection
