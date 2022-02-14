@extends('layouts.master-auth')
@section('title', 'Register Manager')
@section('content')
<!-- Main Content -->
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ URL::asset('assets/img/delicacy-login.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register Manager</h4></div>

              <div class="card-body">
                <form method="POST" action="{{route('register.store.manager')}}">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="user">Username</label>
                      <input type="text" class="form-control" id="user" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="pass">Password</label>
                      <input type="password" class="form-control" id="pass" name="password" placeholder="Masukan Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Masukan Nama Lengkap">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="rumah">Alamat</label>
                      <input type="text" class="form-control" id="rumah" name="alamat" placeholder="Masukan Alamat">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan No. Telpon">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="register" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
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