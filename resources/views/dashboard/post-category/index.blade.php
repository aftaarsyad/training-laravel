@extends('dashboard.layouts.main')

@section('content')
    <div class="row justify-content-center mt-4">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection