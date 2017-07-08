@extends('layouts.app')

@section('title', 'Create set')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-md-5">
            <h3>Create set</h3>
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
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group @if ($errors->has('nice_name')) has-error @endif">
                  {!! Form::label('nice_name', 'Nice Name*') !!}
                  {!! Form::text('nice_name', null, ['class' => 'form-control', 'placeholder' => 'Nice Name']) !!}
                  @if ($errors->has('nice_name')) <p class="help-block">{{ $errors->first('nice_name') }}</p> @endif
              </div>
            </div>
          </div>
          {{--  --}}
          <div class="panel panel-default">
              <div class="panel-heading">
                  Items
              </div>
              <div class="panel-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>item</th>
                        <th>quantity</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody id="receivingitems">

                        <td><input class="form-control" type="text" name="" value=""></td>
                        <td><input class="form-control" type="text" name="" value=""></td>
                        <td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td>

                      </tbody>
                  </table>
                  <a href="#" class="btn btn-success pull-right add-new">add</a>
              </div>
          </div>
          {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </form>
        <script>
          $(document).on('click', '.add-new', function () {
              var tableBody = $(this).parent().find('tbody');
              tableBody.append('<tr><td><input class="form-control" type="text" name="" value=""></td><td><input class="form-control" type="text" name="" value=""></td><td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td></tr>');
              return false;
          });
          $(document).on('click', '.remove', function () {
              var row = $(this).parentsUntil('tr').parent();
              row.remove();
              return false;
          });
          $(document).on('click', '.h', function () {
              alert ="21331";
          });
        </script>
@endsection
