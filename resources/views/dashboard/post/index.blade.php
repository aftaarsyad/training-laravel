@extends('dashboard.layouts.main')

@section('content')
    <div class="row justify-content-center mt-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-md-8">
            <a href="/post/create" class="btn btn-info">Add New Post</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">PostCategory</th>
                    <th scope="col">Author</th>
                    <th scope="col">Body</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->postCategory->name }}</td>
                            <td>{{ $post->author }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic-example">
                                    <a href="/post/{{ $post->id }}/edit" type="button" class="btn btn-warning">Edit</a>
                                    <form action="/post/{{ $post['id'] }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection