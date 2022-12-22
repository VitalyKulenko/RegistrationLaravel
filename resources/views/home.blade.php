@extends('layouts.index')

@section('index-content')
<div class="container relative mx-auto max-w-7xl bg-white px-20 py-10 rounded-lg my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>User ID: {{ Auth::user()->id }}</div>
                <div>Name: {{ Auth::user()->name }}</div>
                <div>Email: {{ Auth::user()->email }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
