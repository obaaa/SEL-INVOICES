@extends('layouts.app')

@section('title', 'Item attributes')

@section('content')
@include('inventory.item_attribute._form_add')
    <div class="row">
        <div class="col-md-5">
          <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Item attributes', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_item_attributes')
              <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#attributeModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
                {{-- <a href="{{ route('item_attributes.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a> --}}
            @endcan
        </div>
    </div>

    <div class="result-item_attributes">
      <div class="input-group col-md-12">
        <input type="search" class="light-table-filter form-control" data-table="members_details" placeholder="Quick Filter">
      </div>
        <table class="table table-bordered table-striped table-hover members_details" id="data-table">
            <thead>
            <tr>
                <th class="no text_align_center">NO</th>
                <th class="name text_align_center">Name</th>
                @can('edit_item_attributes', 'delete_item_attributes')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td class="no">#</td>
                    <td class="name">{{ $item->name }}</td>

                    @can('edit_item_attributes')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'item_attributes',
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
