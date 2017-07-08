@extends('layouts.app')

@section('title', 'customers')

@section('content')
@include('customer._form_add')
    <div class="row">
        <div class="col-md-5">
          <h3 class="modal-title">{{ $result->total() }} {{ str_plural('customers', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_customers')
              <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#customerModal"> <i class="glyphicon glyphicon-plus-sign"></i> New</a>
                {{-- <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a> --}}
            @endcan
        </div>
    </div><hr>

    <div class="result-set container panel-body ">
            @foreach($result as $item)
              <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
                <div class="caption text-center thumbnail">
                  <a href="{{ url('customers/'.$item->id) }}" class="">
                  <h5>{{ $item->name }}</h5>
                  </a>
                  <hr>
                  <h5><b>phone:</b> {{ $item->phone }}</h5>

                </div>
              </div>
            @endforeach
        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
@endsection
