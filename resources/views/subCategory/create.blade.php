@extends('layout.master')

@section('title', 'All Sub-categories')

@section('content')

    <h1 class="text-center my-5">Sub-category create</h1>
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('categories.subcategories.store', $category->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <x-input name="name" type="text" id="name"/>
            <x-input name="image" type="file" id="image"/>
            <button class="btn btn-primary btn-sm my-3"> Submit</button>

        </form>
    </div>
@endsection
