@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin">
            <form action="/register" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
            
                <div class="form-floating mb-3">
                    <input type="text" value= "{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name= "name" id="name" placeholder="Your Name">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" value= "{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name= "email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('email') is-invalid @enderror" name= "password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <small>Already Registered ? <a href="/login">Login</a></small>
            </form>
        </main>

    </div>
</div>

@endsection