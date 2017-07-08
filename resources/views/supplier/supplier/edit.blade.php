@extends('layouts.app')

@section('title', 'Edit Supplier ')

@section('content')

  <div class="row">
      <div class="col-md-11">
        {{-- <h3>Edit {{ $supplier->name }}</h3> --}}
        <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><a href="{{ route('suppliers.index') }}"> Supplier</a></li>
          <li class="active"><a href="{{ url('suppliers/'.$supplier->id) }}"> {{ $supplier->name }}</a></li>
          <li class="active">Edit</li>
        </ol>
      </div>
      <div class="col-md-1 page-action text-right">
          <a href="{{ redirect()->back()->getTargetURL() }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-12">
              <div class="ibox float-e-margins">
                  <div class="ibox-content">
                      {!! Form::model($supplier, ['method' => 'PUT', 'route' => ['suppliers.update',  $supplier->id ] ]) !!}
                          @include('supplier.supplier._form')
                          <!-- Submit Form Button -->
                          {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
