@extends('layouts.master')
@section('title', 'Invoice')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
        <h1>Invoice</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Invoice</div>
        </div>
      </div>
      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            
            
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice-title">
                  <h2>Invoice</h2>
                  <div class="invoice-number">Order #{{$orderlist_id}}</div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Billed To:</strong><br>
                        {{$customer_name}}<br>
                        {{$customer_address}}, Indonesia
                    </address>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Payment Method:</strong><br>
                      Visa ending 3025-9384-4242<br>
                      {{$customer_name}}@gmail.com
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Order Date:</strong><br>
                      {{$order_date}}<br><br>
                    </address>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="section-title">Order Summary</div>
                <p class="section-lead">All items here cannot be deleted.</p>
                <form action="{{ route('confirmPaymentCustomer',$totalPrice) }}" method="POST">
                @csrf
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <thead>
                      <tr>
                        <th data-width="40">No</th>
                        <th>Menu Name</th>
                        <th class="text-center">Menu Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $product['item']['menu_name'] }}</td>
                        <td class="text-center">Rp. {{ number_format($product['item']['harga_menu']) }}</td>
                        <td class="text-center">{{ $product['qty'] }}</td>
                        <td class="text-right">Rp. {{ number_format($product['price']) }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="section-title">Payment Method</div>
                    <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                    <div class="images">
                      <img src="/assets/img/visa.png" alt="visa">
                      <img src="/assets/img/jcb.png" alt="jcb">
                      <img src="/assets/img/mastercard.png" alt="mastercard">
                      <img src="/assets/img/paypal.png" alt="paypal">
                    </div>
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total Qty</div>
                      <div class="invoice-detail-value">{{$totalQty}}</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                      <div class="invoice-detail-value invoice-detail-value-lg">Rp. {{number_format($totalPrice)}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
              <button  type="submit"  class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
              <a href="{{route('menu')}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
            </div>
            {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
          </div>
          </form>
        </div>
      </div>
    </section>
</div>

@if (session()->has('confirmOrder'))
  @php
  echo '<script type="text/javascript">alert("Order Confirmed! Please purchase your order!");</script>';
  @endphp
@endif

@endsection
