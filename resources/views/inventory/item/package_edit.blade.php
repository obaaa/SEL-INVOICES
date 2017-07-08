@extends('layouts.app')

@section('title', 'Edit Item_package')

@section('content')

  <div class="row">
      <div class="col-md-11">
        {{-- <h3>Edit {{ $item_package->name }}</h3> --}}
        <ol class="breadcrumb">
          <li ><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li ><a href="{{ route('items.index') }}">Items</a></li>
          <li ><a href="{{ url('items/'.$item_package->item->id) }}">{{ $item_package->item->name }}</a></li>
          <li class="active">{{ $item_package->name }}</li>
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
                      {!! Form::model($item_package, ['method' => 'PUT', 'route' => ['item_packages.update',  $item_package->id ], 'files' => true, ]) !!}
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {!! Form::label('name', 'Name*') !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-3"> --}}
                          <input type="hidden" name="item_id" value="{{ $item_package->item->id }}">

                        {{-- </div> --}}
                        <div class="col-lg-3 col-md-3">
                          <div class="form-group @if ($errors->has('quantity')) has-error @endif">
                              {!! Form::label('quantity', 'quantity') !!}
                              {!! Form::number('quantity', $item_package->quantity, ['class' => 'form-control', 'placeholder' => 'no']) !!}
                              @if ($errors->has('quantity')) <p class="help-block">{{ $errors->first('quantity') }}</p> @endif
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <div class="form-group @if ($errors->has('discount')) has-error @endif">
                              {!! Form::label('discount', 'discount') !!}
                              {!! Form::number('discount', $item_package->discount, ['class' => 'form-control', 'placeholder' => 'no']) !!}
                              @if ($errors->has('discount')) <p class="help-block">{{ $errors->first('discount') }}</p> @endif
                          </div>
                        </div>
                          <!-- Submit Form Button -->
                          {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
