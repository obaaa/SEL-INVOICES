<br><br>
<div class="row">
  <table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
      <th>Package Name</th>
      <th>Quantity</th>
      <th>Discount</th>
      @can('edit_item_packages', 'deletes')
        <th class="text-center">Actions</th>
      @endcan
    </thead>
    <tbody>
      {{-- @php
        $item_packages = \App\Item_package::where('item_id', '$item->id')->get();
      @endphp --}}
      @foreach ($item->item_packages as $value)
        <tr>
        <td>{{ $value->name }}</td>
        <td>{{ $value->quantity }}</td>
        <td>{{ $value->discount }}</td>
          @can('edit_item_packages')
          <td class="text-center">
            @if ($value->name != 'One item')
              @include('shared._actions', [
                  'entity' => 'item_packages',
                  'id' => $value->id
              ])
            @endif
          </td>
          @endcan
    </tr>
      @endforeach
    </tbody>
  </table>
</div>
