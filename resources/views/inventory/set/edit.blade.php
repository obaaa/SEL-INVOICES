@extends('layouts.app')

@section('title', 'Edit User ')

@section('content')

  <div class="row">
      <div class="col-md-5">
          <h3>Edit set</h3>
      </div>
      <div class="col-md-7 page-action text-right">
          <a href="{{ url('sets') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
      </div>
  </div>
  <form class="" action="#" method="post">

        <div class="row">
          <!-- Name Form Input -->
          <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="form-group @if ($errors->has('name')) has-error @endif">
                {!! Form::label('name', 'Name*') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
          </div>
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
      </form>
@endsection
