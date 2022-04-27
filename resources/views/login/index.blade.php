@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
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
        <main class="form-signin">
            <form action="/login" method="post">
                @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Form Login</h1>
          
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              <small>Not Registered ? <a href="/register">Register</a></small>
            </form>
        </main>

    </div>
</div>

@endsection