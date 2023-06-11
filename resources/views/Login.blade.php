@extends('layout.master')

@section('title', 'Admin Login')

@section('content')

    <div class="col-md-6 offset-md-3">

        <h1 class="text-center text-info my-5">E-commerce Admin Login </h1>

        <form method="POST">
            @csrf

            <x-input name="phone" type="number" value="09400400400" required="" />

            <x-input name="password" type="password" />

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>

    </div>

@endsection
