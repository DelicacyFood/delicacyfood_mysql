@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">Dashboard</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 1</h2>
      {{-- Start Card --}}
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Welcome, {{ session()->get('username') }}!</h2>
              <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
              <div class="mt-4">
                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- End Card --}}
      <div class="card">
        <div class="card-header">
          <h4>Delicacy Food</h4>
        </div>
        <div class="card-body">
          <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delicacy Food adalah Food Marketplace Management System yang menghubungkan customer, menu makanan, driver, dan stakeholder lainnya dengan sistem restoran. Restoran ini merupakan restoran distributor sehingga makanan yang dipasok dalam bahan jadi, lalu diolah dan disajikan oleh waiter sesuai dengan pesanan customer yang memesan melalui pada aplikasi secara delivery ataupun memesan langsung ke restoran secara take away. Untuk customer yang memesan secara delivery, diharuskan memiliki akun untuk masuk ke dalam sistem aplikasi hingga kemudian bisa memesan makanan dan hanya dibatasi 1 akun saja dan juga memiliki saldo e-wallet pada aplikasi.
          </p>
          <p style="text-align: justify;">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada prosesnya, customer memesan suatu makanan tertentu dan akan dimasukkan ke dalam chart atau keranjang pesanan customer tersebut. Setelah itu, customer harus mengkonfirmasi seluruh pesanan yang ada di dalam keranjang dengan jenis layanan tertentu dengan membayar pesanannya yang kemudian akan masuk ke dalam draft pembelian di cashier untuk proses pembayaran. Ketika customer sudah memesan menu makanan, sistem akan mengvalidasi stok menu makanan, jika tersedia maka lanjut ke proses selanjutnya, jika tidak tersedia sistem akan memberikan informasi stok tidak memenuhi. Proses pembayaran sendiri dapat dilakukan dengan berbagai metode pembayaran cash, debit untuk pesanan take away dan e-wallet untuk pesanan delivery. Untuk pesanan delivery, jika saldo customer tidak memenuhi, customer dapat melakukan top-up berupa penambahan saldo e-wallet pada aplikasi dan setiap top-up dari customer akan tersimpan pada database sebagai draft dari masing-masing top-up. Setelah pembayaran, salah seorang driver harus mengonfirmasi untuk mengantar pesanan customer yang memesan secara delivery dan pesanan customer pun segera diolah yang kemudian akan dikirimkan oleh driver yang sudah mengonfirmasi. Seluruh draft pembelian, akan tersimpan sebagai bentuk laporan kepada manajer.
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

{{-- Alert --}}
@if (session()->has('successTopUp'))
  @php
  echo '<script type="text/javascript">alert("Top up Success! Please wait for cashier approval");</script>';
  @endphp
@endif

@if (session()->has('confirmPaymentCustomer'))
  @php
  echo '<script type="text/javascript">alert("Payment Success! Please wait for the driver to confirm your order");</script>';
  @endphp
@endif

@endsection