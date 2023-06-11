@extends('layout.master')

@section('title', 'Edit categories')

@section('content')

    <h1 class="text-center my-5">Edit category</h1>
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('patch')
            <x-input name="name" type="text" id="name" :value="$category->name"/>
            <p>Current image =>
              <a href="{{url('uploads/'.$category->image)}}">{{$category->image}}</a>
            </p>
            <x-input name="image" type="file" id="image" :value="$category->image"/>
            <button class="btn btn-primary btn-sm my-3"> Update </button>

        </form>
    </div>
@endsection
