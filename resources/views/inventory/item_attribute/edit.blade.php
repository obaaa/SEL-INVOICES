@extends('layouts.app')

@section('title', 'Edit item attribute')

@section('content')

  <div class="row">
      <div class="col-md-5">
        <h3>Edit {{ $item_attribute->name }}</h3>
      </div>
      <div class="col-md-7 page-action text-right">
          <a href="{{ redirect()->back()->getTargetURL() }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-12">
              <div class="ibox float-e-margins">
                  <div class="ibox-content">
                      {!! Form::model($item_attribute, ['method' => 'PUT', 'route' => ['item_attributes.update',  $item_attribute->id ] ]) !!}
                          @include('inventory.item_attribute._form_edit')
                          <!-- Submit Form Button -->
                          {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
