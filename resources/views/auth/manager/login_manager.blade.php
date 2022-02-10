@extends('layouts.master-auth')
@section('title', 'Login Manager')
@section('content')
<!-- Main Content -->
<div id="app">
      <section class="section">
        <div class="container mt-5">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                {{ session('success') }}
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                </div>
              </div>
            @endif

            @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible show fade">
                {{ session('loginError') }}
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                </div>
              </div>   
            @endif    
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="login-brand">
                <img src="/assets/img/delicacy-login.png" alt="logo" width="100" class="shadow-light rounded-circle" />
              </div>

              <div class="card card-primary">
                <div class="card-header"><h4>Login Manager</h4></div>

                <div class="card-body">
                  <form action="{{ route('login.custom.manager') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" placeholder="Masukkan Username" name="username" tabindex="1" required autofocus />
                      <div class="invalid-feedback">Please fill in your email</div>
                    </div>

                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                          <a href="{{route('update_password')}}" class="text-small"> Forgot Password? </a>
                        </div>
                      </div>
                      <input id="password" type="password" placeholder="Masukkan Password" class="form-control" name="password" tabindex="2" required />
                      <div class="invalid-feedback">please fill in your password</div>
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" />
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Login</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="mt-5 text-muted text-center">Don't have an account? <a href="{{route('register.manager')}}">Create One</a></div>
              <div class="mt-5 text-muted text-center">
                <a href="{{route('dashboard')}}">Back to previous page</a>
              </div>
              <div class="simple-footer">Copyright &copy; Delicacy Food 2021</div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection