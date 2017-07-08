<br><br>
<div class="row">
  <table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
      <th>#</th>
      <th>invoice no</th>
      <th>customer</th>
      <th>total amount</th>
      <th>amount remain</th>
      <th>amount recipient</th>
      <th>entry date</th>
      @can('edit_items', 'deletes')
        <th class="text-center">Actions</th>
      @endcan
    </thead>
    <tbody>
      @php $x = count($invoice_not_finishs); @endphp
      @foreach ($invoice_not_finishs as $value)
        <tr>
        <td>{{ $x }}</td>
        <td class="invoice_no">{{ $value->id }}</td>
        <td class="customer"><a href="{{ url('customers/'.$value->customer->id) }}">{{ $value->customer->name }}</a></td>
        <td class="total_amount">{{ $value->total_amount }}</td>
        <td class="amount_remain">{{ $value->amount_remain }}</td>
        <td class="amount_recipient">{{ $value->amount_recipient or '0'}}</td>
        <td class="entry_date">{{ $value->entry_date or '00-00-0000'}}</td>
        <input type="hidden" class="invoice_id" name="invoice_id" value="{{ $value->id }}">
        <input type="hidden" class="user" name="user" value="{{ $value->user->name }}">
        <input type="hidden" class="note" name="note" value="{{ $value->note }}">
      {{-- @can('edit_items') --}}
      <td class="text-center">
        {{-- @can('edit_users') --}}
          <a href="#" class="btn btn-xs btn-success paymentModal" data-toggle="modal" data-target="#paymentModal"> <i class="glyphicon glyphicon-plus-sign"></i> payment</a>
          <a href="#" class="btn btn-xs btn-info showModal" data-toggle="modal" data-target="#showModal"> <i class="glyphicon glyphicon-glass"></i> show</a>
        {{-- @endcan --}}
        @can('delete_users')
            {!! Form::open( ['method' => 'delete', 'url' => route('invoices.destroy', ['invoice' => $value->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
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
      {{ $invoice_not_finishs->links() }}
  </div>
</div>
