@extends('layouts.app')
@section('title', 'Items')
@section('content')
@include('inventory.item._form_package_add')
<div class="container">
  <div class="row">
      <div class="col-md-11">
        {{-- <h3 class="modal-title">Item</h3> --}}
        <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><a href="{{ route('items.index') }}">Items</a></li>
          <li class="active">{{ $item->name }}</li>
        </ol>
      </div>
      <div class="col-md-1 page-action text-righ">
          @can('add_items')
            <a href="{{ redirect()->back()->getTargetURL() }}" class="btn btn-default btn-sm pull-right"> <i class="fa fa-arrow-left"></i> Back</a>
          @endcan
      </div>
  </div>
  <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 text-center">
          <h3 class="modal-title"> {{ $item->name }} </h3><hr>
          <img style="width:200px;height:200px;" src="{{ asset('uploads/'.$item->image) }}" alt="item"><hr>
          @can('edit_items')
          <td class="text-center">
              @include('shared._actions', [
                  'entity' => 'items',
                  'id' => $item->id
              ])
          </td>
          @endcan
        </div>
        <div class="col-md-9 col-lg-9 panel">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
            <li><a data-toggle="tab" href="#packaging">Packages<span class="badge">{{ $item->item_packages->count() }}</span></a></li>
          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              @include('inventory.item._info')
            </div>
            <div id="packaging" class="tab-pane fade">
              <br>
              <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#item_packageModal"> <i class="glyphicon glyphicon-plus-sign"></i> New</a>
              @include('inventory.item._package')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
