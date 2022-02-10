@extends('layouts.master')
@section('title', 'Driver')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Orderlist</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">Orderlist</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 3</h2>
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Order Record Table -- 2</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Orderlist Id</th>
                      <th>Order date</th>
                      <th>Total Price</th>
                      <th>Process Status</th>
                      <th>Service Status</th>
                      <th>Driver</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orderlist as $order_list)
                    @if($order_list->status_proses == 'Payment Completed')
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $order_list->orderlist_id }}</td>
                      <td>{{ date_format(date_create($order_list->order_date),"Y/m/d") }}</td>
                      <td>Rp. {{ number_format($order_list->total_bayar) }}</td>
                      <td>{{ $order_list->status_proses }}</td>
                      <td>{{ $order_list->status_layanan }}</td>
                      <td>{{ $order_list->driver_id }}</td>
                      <td>
                        <form action="{{route('deleteOrderlist',$order_list->orderlist_id)}}" method="POST"> @csrf
                          <a href="{{route('detailDriver', $order_list->orderlist_id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Confirm">Confirm</a>
                          {{-- <button class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="confirm('Are You Sure Wants To Delete it?')"><i class="fas fa-trash"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@if (session()->has('confirmDelivered'))
  @php
  echo '<script type="text/javascript">alert("Order Delivered! Please Check Your Orderlist");</script>';
  @endphp
@endif

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