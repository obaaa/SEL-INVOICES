<br><br>
<div class="row">
  <table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
      <th>#</th>
      <th>invoice no</th>
      <th>total amount</th>
      <th>entry date</th>
      @can('edit_items', 'deletes')
        <th class="text-center">Actions</th>
      @endcan
    </thead>
    <tbody>
      @php $x = count($bill_finishs); @endphp
      @foreach ($bill_finishs as $value)
        <tr>
        <td>{{ $x }}</td>
        <td class="invoice_no">{{ $value->invoice_no }}</td>
        <td class="total_amount">{{ $value->total_amount }}</td>
        <td class="entry_date">{{ $value->entry_date }}</td>
        <input type="hidden" class="bill_id" name="bill_id" value="{{ $value->id }}">
        <input type="hidden" class="user" name="user" value="{{ $value->user->name }}">
        <input type="hidden" class="note" name="note" value="{{ $value->note }}">
      {{-- @can('edit_items') --}}
      <td class="text-center">
        {{-- @can('edit_users') --}}
          {{-- <a href="#" class="btn btn-xs btn-success paymentModal" data-toggle="modal" data-target="#paymentModal"> <i class="glyphicon glyphicon-plus-sign"></i> payment</a> --}}
          <a href="#" class="btn btn-xs btn-info showModal" data-toggle="modal" data-target="#showModal"> <i class="glyphicon glyphicon-glass"></i> show</a>
        {{-- @endcan --}}
        @can('delete_users')
            {!! Form::open( ['method' => 'delete', 'url' => route('bills.destroy', ['bill' => $value->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
                <button type="submit" class="btn-delete btn btn-xs btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            {!! Form::close() !!}
        @endcan
      </td>
      {{-- @endcan --}}
    </tr>@php $x-=1; @endphp
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
      {{ $bill_finishs->links() }}
  </div>
</div>
