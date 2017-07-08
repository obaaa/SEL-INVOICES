@extends('layouts.app')
@section('title', 'Items')
@section('content')
@include('inventory.item._form_add')
    <div class="row">
      <div class="col-md-9">
        <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Items</li>
        </ol>
      </div>
      <div class="col-md-2 page-action text-right">
        <input type="text" id="searchInput" onkeyup="searchFunction()" class="form-control searchInput input-sm" placeholder="Search for items.." title="Type in a name">
      </div>
      <div class="col-md-1 page-action text-right">
        @can('add_items')
          <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#itemModal"> <i class="glyphicon glyphicon-plus-sign"></i> New</a>
        @endcan
      </div>
    </div>
    <div class="result-items">
      @foreach($result as $item)
        <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4 box">
          <a href="{{ url('items/'.$item->id) }}" class="thumbnail">
            <img style="width:150px;height:150px;" src="{{ asset('uploads/'.$item->image) }}" alt="...">
            <div class="caption text-center">
              <h5 class="box_name">{{ $item->name }}</h5>
            </div>
          </a>
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
          if (text.innerHTML.toUpperCase().indexOf(filter) > -1) {
            $('.box')[i].style.display = "";
          } else {
            $('.box')[i].style.display = "none";
          }
        }
      }
    </script>
@endsection
