@extends('layouts.app')
@section('title', 'bills')
@section('content')
  <script src="{{asset('/js/payment.js')}}"></script>
  @include('supplier.payment')
  @include('supplier.show')
    <div class="row">
        <div class="col-md-11">
            {{-- <h3>Bills</h3> --}}
            <ol class="breadcrumb">
              <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">bills</li>
            </ol>
        </div>
        <div class="col-md-1 page-action text-right">
          <a href="{{ route('bills.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> purchase</a>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 panel">
      <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#invoice_outstanding">Bill not finish</a></li>
        <li><a data-toggle="tab" href="#invoice_ended">Bill finish</a></li>
      </ul>
      <div class="tab-content">
        {{-- bill_finishs
        bill_not_finishs --}}
        <div id="invoice_outstanding" class="tab-pane fade fade in active">
          @include('supplier._bill_not_finish')
        </div>
        <div id="invoice_ended" class="tab-pane fade">
          @include('supplier._bill_finish')
        </div>
      </div>
    </div>
@endsection
