@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{$customer_name}}!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Username</div>
                  <div class="profile-widget-item-value">{{$customer_name}}</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Saldo</div>
                  <div class="profile-widget-item-value">{{$saldo}}</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description text-center">
              {{-- <div class="profile-widget-name">{{$customer_name}} 
                <div class="text-muted d-inline font-weight-normal">
                  <div class="slash"></div> 
                  Web Developer
                </div>
              </div> --}}
              Id : <b>{{$customer_id}}</b><br>
              Username : <b>{{$customer_name}}</b><br>
              Role : <b>{{$customer_role}}</b><br>
              Address : <b>{{$customer_address}}</b><br>
            </div>
            <div class="card-footer text-center">
              <div class="font-weight-bold mb-2">Follow {{$customer_name}} On</div>
              <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-github mr-1">
                <i class="fab fa-github"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="{{ route('edit_profile') }}" method="post" class="needs-validation" novalidate=""> @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="{{$customer_name}}" required="" >
                      <div class="invalid-feedback">
                        Please fill in the username
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nama lengkap</label>
                      <input type="text" class="form-control" name="namaLengkap" placeholder="..." required="">
                      <div class="invalid-feedback">
                        Please fill in the full name
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-12">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" value="{{$customer_address}}" required="">
                      <div class="invalid-feedback">
                        Please fill in the address
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group mb-0 col-12">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                        <label class="custom-control-label" for="newsletter">Confirm to edit</label>
                        <div class="text-muted form-text">
                          You will get new information about products, offers and promotions
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

<!-- push JavaScript -->
@push('scripts')
<!-- JS Libraies -->
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
@endpush

<!-- Push CSS -->
@push('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">
@endpush