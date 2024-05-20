@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                    placeholder="Title" />
                <small id="helpId" class="form-text text-muted">Insert project's title</small>
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="cover_image" class="form-control" name="cover_image" id="cover_image" aria-describedby="helpId"
                    placeholder="Https://" />
                <small id="helpId" class="form-text text-muted">Insert project's image</small>
            </div>

            <div class="mb-3">
                <label for="project_link" class="form-label">Project's link</label>
                <input type="project_link" class="form-control" name="project_link" id="project_link"
                    aria-describedby="helpId" placeholder="Https://" />
                <small id="helpId" class="form-text text-muted">Insert project's link</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                <small id="helpId" class="form-text text-muted">Insert project's description</small>
            </div>


            <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Previous</a>
            <button type="submit" class="btn btn-primary">
                Save
            </button>



        </form>
    </div>
@endsection
