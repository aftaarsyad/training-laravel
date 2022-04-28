@extends('dashboard.layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Form Edit Post</h1>
            <form action="/post/{{ $edit['id'] }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{ $edit['title'] }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" required>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="post_category" class="form-label">Post Category</label>
                    <select class="form-select" name="post_category_id">
                        <option selected disabled>Choose Post Category</option>
                        @foreach ($postCategory as $data)
                        <option value="{{ $data->id }}" @if ($data->id == $edit->post_category_id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" value="{{ $edit['author'] }}" name="author" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="author" required>
                    @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if ($edit->image)
                    <img src="{{ asset('storage/' . $edit->image) }}" class="img-preview img-fluid col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid col-sm-5 d-block">    
                    @endif
                    <input class="form-control" onChange="previewImage()" name="image" type="file" id="image">
                  </div>

                  <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" required>{{ $edit->body }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection