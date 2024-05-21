@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        @include('partials.session-messages')

        <form action="{{ route('admin.projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')



            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="helpId" placeholder="Title" value="{{ old('title', $project->title) }}" />
                <small id="helpId" class="form-text text-muted">Insert project's title</small>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="cover_image" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="helpId" placeholder="Https://"
                    value="{{ old('cover_image', $project->cover_image) }}" />
                <small id="helpId" class="form-text text-muted">Insert project's image</small>
                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="project_link" class="form-label">Project's link</label>
                <input type="project_link" class="form-control @error('project_link') is-invalid @enderror"
                    name="project_link" id="project_link" aria-describedby="helpId" placeholder="Https://"
                    value="{{ old('project_link', $project->project_link) }}" />
                <small id="helpId" class="form-text text-muted">Insert project's link</small>
                @error('project_link')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description', $project->description) }}</textarea>
                <small id="helpId" class="form-text text-muted">Insert project's description</small>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Previous</a>
            <button type="submit" class="btn btn-primary">
                Save
            </button>



        </form>
    </div>
@endsection
