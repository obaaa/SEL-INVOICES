@extends('layouts.app')
@section('title', 'purchase')
@section('content')
  <script src="{{asset('/js/purchase.js')}}"></script>
    <div class="row">
        <div class="col-md-11">
            <ol class="breadcrumb">
              <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><a href="{{ route('bills.index') }}"> Bills</a></li>
              <li class="active">Purchase</li>
            </ol>
        </div>
    </div>
    {!! Form::open(['route' => ['bills.store'] ]) !!}

          <div class="row">
            <!-- Name Form Input -->
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group @if ($errors->has('supplier_id')) has-error @endif">
                  {!! Form::label('supplier', 'supplier*') !!}
                  <input list="supplier"  required="true" name="supplier" class="form-control border-input supplier">
                  <datalist id="supplier" name="supplier">
                    @foreach ($suppliers as $item)
                    <option  value="{{$item->name}}">
                    @endforeach
                  </datalist>
                  @if ($errors->has('supplier_id')) <p class="help-block">{{ $errors->first('supplier_id') }}</p> @endif
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group @if ($errors->has('invoice_no')) has-error @endif">
                  {!! Form::label('invoice_no', 'Invoice no*') !!}
                  {!! Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => 'Invoice no']) !!}
                  @if ($errors->has('invoice_no')) <p class="help-block">{{ $errors->first('invoice_no') }}</p> @endif
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group @if ($errors->has('entry_date')) has-error @endif">
                  {!! Form::label('entry_date', 'entry date*') !!}
                  {!! Form::date('entry_date', null, ['class' => 'form-control', 'placeholder' => 'entry date']) !!}
                  @if ($errors->has('entry_date')) <p class="help-block">{{ $errors->first('entry_date') }}</p> @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group @if ($errors->has('note')) has-error @endif">
                  {!! Form::label('note', 'Note*') !!}
                  {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Note', 'rows' => '2']) !!}
                  @if ($errors->has('note')) <p class="help-block">{{ $errors->first('note') }}</p> @endif
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
                        <th>package</th>
                        <th>quantity</th>
                        <th>amount</th>
                        <th>Expir date</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody class="body">
                        <tr>
                          <td><select class="form-control item" name="item_id[]"></select></td>
                          <td><select class="form-control item_packages" id="item_packages" name="item_package_id[]"></select></td>
                          <td><input class="form-control quantity" type="number" name="quantity[]" value=""></td>
                          <td>
                            <input class="form-control amount" type="number" name="amount[]" value="">
                          </td>
                          <td><input class="form-control" type="date" name="expir_date[]"></td>
                          <td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <td></td><td></td><td></td>
                        <td>total: <code><b class="total">0</b></code></td>
                        <td></td><td></td>
                      </tfoot>
                  </table>
                  <a href="#" class="btn btn-success pull-right add-new">add</a>
              </div>
          </div>
          {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
@endsection
