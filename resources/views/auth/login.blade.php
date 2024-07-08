@extends('layouts.auth')

@section('title', 'Login')
@section('container')
<style>
  .login-btn {
    background-color: #0093E9;
    background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);

  }
</style>
<div class="container py-5 h-100 my-5 px-5">
  <div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-4">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissble fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissble fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <img src="https://cdn.pixabay.com/photo/2020/08/03/09/39/medical-5459630_960_720.png" class="img-fluid" alt="Phone image" />
    </div>
    <div class="col-md-8">
      <div class="mb-5">
        <span class="h1 fw-bold mb-0">Penilaian Nakes </span>
        <i class="fa-solid fa-star-of-life fa-2x" style="color: #2d31fa"></i>
      </div>
      <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf
        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px">Log in</h3>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="email">Email/Username</label>
          <input type="text" name="email" id="email" class="form-control form-control-lg fs-6 @error('email') is-invalid @enderror" placeholder="Masukkan Email/Username..." required value="{{ old('email') }}" />
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label fw-bold" for="password">Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control form-control-lg fs-6" placeholder="Masukkan Password..." required />
            <span class="input-group-text">
              <i class="fa-solid fa-eye" id="toggle-password" style="cursor: pointer" toggle="#password"></i>
            </span>
          </div>
        </div>
        <!-- Submit button -->
        <div class="d-grid gap-2 pt-4">
          <button type="submit" class="btn login-btn btn-lg btn-block text-light">Log In</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection