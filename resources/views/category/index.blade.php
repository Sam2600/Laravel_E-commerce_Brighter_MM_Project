@extends('layout.master')

@section('title', 'All categories')

@section('content')
    <h1>All categories</h1>

    <div class="col-md-8">

        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm mb-4 my-3">Create
            <i class="material-icons">add</i>
        </a>

        <table class="table table-bordered border-dark text-center text-align">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Child</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td> <img src="{{ url('uploads/' . $cat->image) }}" alt="" width="50" height="40">
                        </td>
                        <td>
                            <a href="{{route('categories.subcategories.index', $cat->id)}}" class="btn btn-info btn-sm">
                                <i class="material-icons">visibility</i>
                            </a>
                        </td>
                        <td>

                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                                <i class="material-icons">edit</i>
                            </a>

                            <x-delete :action="route('categories.destroy', $cat->id)"/>
                        </td>

                        {{-- <td>
                                <a href="#" class="btn btn-success btn-sm">View</a>
                            </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
