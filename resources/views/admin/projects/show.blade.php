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
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Previous</a>
    </div>
@endsection
