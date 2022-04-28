@extends('dashboard.layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Form Create Post</h1>
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" required>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="post_category" class="form-label">Post Category</label>
                    <select class="form-select" name="post_category_id">
                        <option selected>Choose Post Category</option>
                        @foreach ($postCategory as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="author" required>
                    @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" name="image" type="file" id="image">
                  </div>

                  <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" required></textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection