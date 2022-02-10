@extends('layouts.master')
@section('title', 'Orderlist Manager')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Orderlist Manager</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">Orderlist Manager</div>
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
                <table class="table table-striped" id="order-record-table">
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
                          <a href="{{route('detailOrderlist_manager', $order_list->orderlist_id)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail">Detail</a>
                          {{-- <button class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="confirm('Are You Sure Wants To Delete it?')"><i class="fas fa-trash"></i></button> --}}
                        </form>
                      </td>
                    </tr>
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
@endsection

<!-- push JavaScript -->
@push('scripts')
<script type="text/javascript" src="/index-table/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/index-table/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="/index-table/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="/index-table/js/jszip.min.js"></script>
<script type="text/javascript" src="/index-table/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="/index-table/js/substable.js"></script>
@endpush

<!-- Push CSS -->
@push('css')
<!-- CSS Libraries -->
<link rel="stylesheet" type="text/css" href="/index-table/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/index-table/css/buttons.dataTables.min.css" />
{{-- <link rel="stylesheet" type="text/css" href="/index-table/css/styles.css" /> --}}
@endpush