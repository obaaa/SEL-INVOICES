@extends('layouts.app')

@section('title', 'Edit item')

@section('content')

  <div class="row">
      <div class="col-md-11">
        {{-- <h3>Edit {{ $item->name }}</h3> --}}
        <ol class="breadcrumb">
          <li ><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li ><a href="{{ route('items.index') }}">Items</a></li>
          <li ><a href="{{ url('items/'.$item->id) }}">{{ $item->name }}</a></li>
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
                      {!! Form::model($item, ['method' => 'PUT', 'route' => ['items.update',  $item->id ], 'files' => true, ]) !!}
                          @include('inventory.item._form')
                          <!-- Submit Form Button -->
                          {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
