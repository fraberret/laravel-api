@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
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
                            <td><a href="{{ route('admin.projects.show', $project) }}">Show</a></td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="3">Nothing found</td>

                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>
@endsection
