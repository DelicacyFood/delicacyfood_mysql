@extends('layouts.master')
@section('title', 'Confirm Order')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Confirm Orderlist</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">Ordermenu</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 3</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Order Record Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Menu Name</th>
                      <th>Menu Price</th>
                      <th>Qty</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $totalPrice = 0;
                    @endphp
                    @foreach($products as $product)
                    @php
                    $temp_price = 0;
                    $temp_price += $product->harga_menu * $product->jumlah_order;
                    @endphp
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $product->menu_name }}</td>
                      <td>Rp. {{ number_format($product->harga_menu) }}</td>
                      <td>{{ $product->jumlah_order }}</td>
                      <td>Rp. {{ number_format($temp_price) }}</td>
                    </tr>
                    @php
                    $totalPrice += $temp_price;
                    @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="1">Total Price</th>
                      <th>Rp. {{number_format($totalPrice)}}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <br><br><br>              
              <div class="text-md-right">
                <form method="POST" action="{{ route('confirmPayment', $orderlist_id) }}"> @csrf
                  <div class="float-lg-left mb-lg-0 mb-3">
                    <a href="{{route('orderlist')}}" class="btn btn-info btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back to Orderlist</a>
                  </div>
                  <div class="float-lg-left mb-lg-0 mb-3 ml-2">
                      <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i>Confirm Payment</button>
                  </div>
                </form>
              </div>
            </div>
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
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
@endpush

<!-- Push CSS -->
@push('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush