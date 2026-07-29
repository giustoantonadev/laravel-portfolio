@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<h1 class="mb-4">{{ $project->title }}</h1>

<div class="card bg-secondary text-light">
    <div class="card-body">

        <p><strong>Slug:</strong> {{ $project->slug }}</p>

        <p><strong>Descrizione:</strong></p>
        <p>{{ $project->description }}</p>

        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid mt-3">
        @endif

    </div>
</div>

<a href="{{ route('projects.index') }}" class="btn btn-outline-light mt-3">
    Torna alla lista
</a>
@endsection
