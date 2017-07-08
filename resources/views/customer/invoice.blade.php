@extends('layouts.app')
@section('title', 'invoices')
@section('content')
  <script src="{{asset('/js/payment_sell.js')}}"></script>
  @include('customer.payment')
  @include('customer.show0')
    <div class="row">
        <div class="col-md-11">
            <ol class="breadcrumb">
              <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Invoices</li>
            </ol>
        </div>
        <div class="col-md-1 page-action text-right">
          <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> sell</a>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 panel">
      <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#invoice_outstanding">Invoice not finish</a></li>
        <li><a data-toggle="tab" href="#invoice_ended">Invoice finish</a></li>
      </ul>
      <div class="tab-content">
        <div id="invoice_outstanding" class="tab-pane fade fade in active">
          @include('customer._invoice_not_finish')
        </div>
        <div id="invoice_ended" class="tab-pane fade">
          @include('customer._invoice_finish')
        </div>
      </div>
    </div>
@endsection
