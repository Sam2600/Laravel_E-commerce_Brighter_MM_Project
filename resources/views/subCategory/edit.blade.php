@extends('layout.master')

@section('title', 'Edit Sub-categories')

@section('content')

    <h1 class="text-center my-5">Edit sub-category</h1>
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('patch')
            <x-input name="name" type="text" id="name" :value="$subcategory->name" />
            <p>Current image =>
                <a href="{{ url('uploads/' . $subcategory->image) }}">{{ $subcategory->image }}</a>
            </p>
            <x-input name="image" type="file" id="image" :value="$subcategory->image" />
            <button class="btn btn-primary btn-sm my-3"> Update </button>

        </form>
    </div>
@endsection
