@extends('dashboard.layouts.main')

@section('content')
    <div class="row justify-content-center mt-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-md-8">
            <a href="/post-category/create" class="btn btn-info">Add Post Category</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $postCategory)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $postCategory['name'] }}</td>
                    <td>{{ $postCategory['description'] }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/post-category/{{ $postCategory->id }}/edit" type="button" class="btn btn-warning">Edit</a>
                            <a href="" type="button" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection