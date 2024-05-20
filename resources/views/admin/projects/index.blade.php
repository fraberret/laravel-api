@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td><img width="100" src="{{ $project->cover_image }}" alt=""></td>
                            <td>{{ $project->description }}</td>
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
