@extends('layouts.app')

@section('title', ' expenses')

@section('content')
@include('expense._form_add')
    <div class="row">
        <div class="col-md-11">
          {{-- <h3 class="modal-title">{{ $result->total() }} {{ str_plural(' expenses', $result->count()) }} </h3> --}}
          <ol class="breadcrumb">
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Expenses</li>
          </ol>
        </div>
        <div class="col-md-1 page-action text-right">
            @can('add_expenses')
              <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#expenseModal"> <i class="glyphicon glyphicon-plus"></i> New</a>
            @endcan
        </div>
    </div>

    <div class="result-expenses">
      <div class="input-group col-md-12">
        <input type="search" class="light-table-filter form-control" data-table="members_details" placeholder="Quick Filter">
      </div>
        <table class="table table-bordered table-striped table-hover members_details" id="data-table">
            <thead>
            <tr>
                <th class="no text_align_center">NO</th>
                <th class="categorie text_align_center">categorie</th>
                <th class="date text_align_center">date</th>
                <th class="amount text_align_center">amount</th>
                <th class="user text_align_center">user</th>
                <th class="note text_align_center">note</th>
                @can('edit_expenses', 'delete_expenses')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
              @if (($item->expense_categorie_id) != 1)
                <tr>
                    <td class="no">#</td>
                    <td class="categorie">{{ \App\Expense_categorie::find($item->expense_categorie_id)->name }}</td>
                    <td class="date">{{ $item->entry_date }}</td>
                    <td class="amount">{{ $item->amount }}</td>
                    <td class="user">{{ $item->user->name }}</td>
                    <td class="note">{{ $item->note }}</td>

                    @can('edit_expenses')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'expenses',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
              @endif
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
@endsection
