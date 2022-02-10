@extends('layouts.master')
@section('title', 'History Top-up')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>History Top-up</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Views</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">History Top-up</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 6</h2>
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Record Top-up History</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>History_Topup_id</th>
                      <th>Customer_User_id</th>
                      <th>Top up Date</th>
                      <th>Total Top up</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($historytopup as $history_topup)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{ $history_topup->history_topup_id }}</td>
                      <td>{{ $history_topup->customer_user_id }}</td>
                      <td>{{ date_format(date_create($history_topup->tanggal_topup),"Y/m/d") }}</td>
                       <td>Rp. {{ number_format($history_topup->jumlah_topup) }}</td>
                      <td>{{ $history_topup->status_topup }}</td>
                      <td>
                        <form action="{{route('store_saldo', [$history_topup->jumlah_topup, $history_topup->history_topup_id, $history_topup->customer_user_id,])}}" method="POST"> @csrf
                          <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Confirm" onclick="confirm('Are You Sure Wants To Confirm it?')">Confirm</button>
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

{{-- Alert --}}
@if (session()->has('topUpConfirmed'))
  @php
  echo '<script type="text/javascript">alert("Top up Confirmed!");</script>';
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