@extends('layouts.app')
@section('title', 'customer')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-11">
        {{-- <h3 class="modal-title">customer</h3> --}}
        <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><a href="{{ route('customers.index') }}"> Customers</a></li>
          <li class="active">{{ $customer->name }}</li>
        </ol>
      </div>
      <div class="col-md-1 page-action text-righ">
          @can('add_customers')
            <a href="{{ redirect()->back()->getTargetURL() }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
          @endcan
      </div>
  </div>
  <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 text-center">
          <h3 class="modal-title">{{ $customer->name }} </h3><hr>
          <img style="width:200px;height:200px;" src="#" alt="item"><hr>
          @can('edit_customers')
          <td class="text-center">
              @include('shared._actions', [
                  'entity' => 'customers',
                  'id' => $customer->id
              ])
          </td>
          @endcan
        </div>
        <div class="col-md-9 col-lg-9 panel">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
            <li><a data-toggle="tab" href="#invoice_outstanding">Invoice not finish</a></li>
            <li><a data-toggle="tab" href="#invoice_ended">Invoice finish</a></li>
          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              @include('customer._info')
            </div>
            <div id="invoice_outstanding" class="tab-pane fade">
              @include('customer._invoice_not_finish')
            </div>
            <div id="invoice_ended" class="tab-pane fade">
              @include('customer._invoice_finish')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
