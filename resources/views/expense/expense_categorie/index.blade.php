@extends('layouts.app')

@section('title', ' expense_categories')

@section('content')
@include('expense.expense_categorie._form_add')
    <div class="row">
        <div class="col-md-5">
          <h3 class="modal-title">{{ $result->total() }} {{ str_plural('expense categories', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_expense_categories')
              <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#expense_categorieModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
            @endcan
        </div>
    </div>

    <div class="result-expense_categories">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>NO</th>
                <th>name</th>
                @can('edit_expense_categories', 'delete_expense_categories')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>#</td>
                    <td>{{ $item->name }}</td>

                    @can('edit_expense_categories')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'expense_categories',
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
