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
                            <td>{{ $project->slug }}</td>
                            <td><img width="100" src="{{ $project->cover_image }}" alt=""></td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->project_link }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">Show</a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalId">
                                        Delete
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    Attention| Deleting: {{ $project->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">You are about to delete this</div>
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
