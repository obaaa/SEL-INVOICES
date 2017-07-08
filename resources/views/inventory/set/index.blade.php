@extends('layouts.app')

@section('title', 'sets')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">000 sets </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_users')
                <a href="{{ url('sets.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>nice name</th>
                <th>Price</th>

                @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($result as $set) --}}
                <tr>
                    <td>000</td>
                    <td>namenamenamename</td>
                    <td>nice_name</td>
                    <td>00.0</td>


                    @can('edit_users')
                    <td class="text-center">
                    @can('edit_users')
                        <a href="{{ url('sets.edit') }}" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i> Edit</a>
                    @endcan

                    @can('delete_users')
                            <button type="submit" class="btn-delete btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                    @endcan
                    </td>
                    {{-- <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $set->id
                        ])
                    </td> --}}
                    @endcan
                </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>

        <div class="text-center">
            {{-- {{ $result->links() }} --}}
        </div>
    </div>

@endsection
