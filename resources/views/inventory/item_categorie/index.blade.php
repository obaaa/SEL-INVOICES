@extends('layouts.app')

@section('title', 'Item Categories')
{{-- <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script> --}}

@section('content')
@include('inventory.item_categorie._form_add')
    <div class="row">
        <div class="col-md-5">
          <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Item Categories', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_item_categories')
              <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#categorieModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
                {{-- <a href="{{ route('item_categories.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a> --}}
            @endcan
        </div>
    </div>
    <div class="result-set">
        <div class="input-group col-md-12">
          <input type="search" class="light-table-filter form-control" data-table="members_details" placeholder="Quick Filter">
        </div>
        <table class="table table-bordered table-striped table-hover members_details" id="data-table">
            <thead>
            <tr>
                <th class="no text_align_center">NO</th>
                <th class="name text_align_center">Name</th>
                <th class="color text_align_center">color</th>
                @can('edit_item_categories', 'delete_item_categories')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td class="no">#</td>
                    <td class="name">{{ $item->name }}</td>
                    <td style="background-color: {{ $item->color }};" class="color"></td>

                    @can('edit_item_categories')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'item_categories',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
@endsection
