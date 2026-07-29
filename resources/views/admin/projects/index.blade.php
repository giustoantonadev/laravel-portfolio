@extends('layouts.admin')

@section('title', 'Progetti')

@section('content')
<h1 class="mb-4">Lista Progetti</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Slug</th>
            <th>Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-primary">
                        Vedi
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
