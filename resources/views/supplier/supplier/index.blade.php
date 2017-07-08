@extends('layouts.app')
@section('title', 'suppliers')
@section('content')
@include('supplier.supplier._form_add')
    <div class="row">
        <div class="col-md-9">
          <ol class="breadcrumb">
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Suppliers</li>
          </ol>
        </div>
        <div class="col-md-2 page-action text-right">
          <input type="text" id="searchInput" onkeyup="searchFunction()" class="form-control searchInput input-sm" placeholder="Search for suppliers.." title="Type in a name">
        </div>
        <div class="col-md-1 page-action text-right">
            @can('add_suppliers')
              <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#supplierModal"> <i class="glyphicon glyphicon-plus-sign"></i> New</a>
            @endcan
        </div>
    </div>
    <div class="result-set panel-body ">
            @foreach($result as $item)
              <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4 box">
                <div class="caption text-center thumbnail">
                  <a href="{{ url('suppliers/'.$item->id) }}" class="">
                  <h5 class="box_name">{{ $item->name }}</h5>
                  </a>
                  <hr>
                  <h5 class="box_phone"><b>phone:</b> {{ $item->phone }}</h5>
                </div>
              </div>
            @endforeach
        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
    <script>
      function searchFunction() {
        var input, filter, box, box_name, getbox, name;
        input = $('.searchInput').val();
        filter = input.toUpperCase();
        no = $('.box').length;
        for (i = 0; i < no; i++) {
          var text = $('.box_name')[i];
          var phone = $('.box_phone')[i];
          if (text.innerHTML.toUpperCase().indexOf(filter) > -1 || phone.innerHTML.toUpperCase().indexOf(filter) > -1) {
            $('.box')[i].style.display = "";
          } else {
            $('.box')[i].style.display = "none";
          }
        }
      }
    </script>
@endsection
