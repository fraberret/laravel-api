@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center py-4">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new Projects</a>
        </div>

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Project Link</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>

                            <td>{{ $project->title }}</td>
                            <td>{{ $project->type ? $project->type->name : 'Uncategorized' }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                @if (Str::startsWith($project->cover_image, 'https://'))
                                    <img width="140" loading="lazy" src="{{ $project->cover_image }}"
                                        alt="{{ $project->title }}">
                                @else
                                    <img width="140" loading="lazy" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="{{ $project->title }}">
                                @endif
                            </td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->project_link }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn-m" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $project->id }}">
                                        Delete
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                    Delete project
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this project:
                                                {{ $project->title }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Optional: Place to the bottom of scripts -->

                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="3">Nothing found</td>

                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
