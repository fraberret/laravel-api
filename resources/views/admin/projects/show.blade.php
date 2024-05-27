@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <img src="{{ $project->cover_image }}" alt="">
            </div>
            <div class="col">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->description }}</p>
                <p><strong>Type: </strong>{{ $project->type ? $project->type->name : 'Uncategorized' }}</p>

                <p><strong>Tecnologie usate:</strong></p>
                <ul>

                    @foreach ($project->technologies as $technology)
                        <li>{{ $technology->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Previous</a>
    </div>
@endsection
