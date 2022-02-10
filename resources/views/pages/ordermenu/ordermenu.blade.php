@extends('layouts.master')
@section('title', 'DataTables')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Ordermenu</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">Ordermenu</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 3</h2>
      @if(session()->has('cart'))
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Order Record Table -- 1</h4>
            </div>
            <form action="{{ route('confirmOrder') }}" method="POST">
            @csrf
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $product['item']['menu_name'] }}</td>
                      <td>Rp. {{ number_format($product['item']['harga_menu']) }}</td>
                      <td>{{ $product['qty'] }}</td>
                      <td>Rp. {{ number_format($product['price']) }}</td>
                      <td>
                        <form action="{{ route('deleteOrdermenu',$product['item']['menu_id']) }}" method="POST"> @csrf
                          <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                          <button class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="confirm('Are You Sure Wants To Delete it?')"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="2">Total Belanja : &emsp;Rp. {{number_format($totalPrice)}}</th>
                      <th colspan="2">Total Qty : &emsp;{{$totalQty}}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              {{-- Check Button Status Layanan --}}
              <div class="section-title">Service Status</div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="status_layanan" class="custom-control-input" value="Take Away">
                <label class="custom-control-label" for="customRadioInline1">Take Away</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="status_layanan" class="custom-control-input" value="Delivery" checked>
                <label class="custom-control-label" for="customRadioInline2">Delivery</label>
              </div>
              {{-- End Check Button Status layanan --}}
              <br><br><br>              
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="{{route('menu')}}" class="btn btn-info btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back to Menu Page</a>
                </div>
                <div class="float-lg-left mb-lg-0 mb-3 ml-2">
                    <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
            </form>
                </div>
                {{-- <div class="float-lg-left mb-lg-0 mb-3 ml-2">
                  <form action="{{ route('cancelOrdermenu') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>Cancel</button>
                  </form>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
      @endif
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

{{-- Alert --}}
@if (session()->has('notEnoughSaldo'))
  @php
  echo '<script type="text/javascript">alert("Saldo is not enough!");</script>';
  @endphp
@endif