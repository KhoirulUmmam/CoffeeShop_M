@extends('layouts.auth')

@section('login')
<div class="login-box">
   
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/kopilogo.jpg') }}" alt="Kopi Logo" style="width: 100px; border-radius: 50%;">
            </a>
          </div>

        <form action="{{ route('login') }}" method="post">
            @csrf
          <div class="input-group mb-3 @error('email') has-error @enderror">
            <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>  
            @error('email')
            <label class="col-form-label help-block" for="inputError" style="color: red">
             <span class="help-block">{{ $message }}</span>
            </label>
            @enderror
          </div>
          <div class="input-group mb-3 @error('password') has-error @enderror">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="help-block">{{ $message }}</span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection