@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Technologies</h1>
        <div class="row">
            <div class="col-6">

                @include('partials.session-messages')

                <div class="table-responsive">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($technologies as $technology)
                                <tr class="">
                                    <td scope="row">{{ $technology->id }}</td>

                                    <td>{{ $technology->name }}</td>

                                    <td>
                                        <div class="d-flex align-items-center gap-1">

                                            <a class="btn btn-primary"
                                                href="{{ route('admin.technologies.edit', $technology) }}"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger btn-m" data-bs-toggle="modal"
                                                data-bs-target="#modal-{{ $technology->id }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modal-{{ $technology->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitle-{{ $technology->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle-{{ $technology->id }}">
                                                            Delete technology
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this technology:
                                                        {{ $technology->name }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.technologies.destroy', $technology) }}"
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
                {{ $technologies->links('pagination::bootstrap-5') }}
            </div>

            <div class="col-6">

                @include('partials.validation-messages')

                <form action="{{ route('admin.technologies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="helpId" placeholder="name" />
                        <small id="helpId" class="form-text text-muted">Insert project's name</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Previous</a>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>





                </form>
            </div>


        </div>
    </div>
@endsection
