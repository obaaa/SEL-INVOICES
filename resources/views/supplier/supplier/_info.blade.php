<br>
<div class="list-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
  <a href="#" class="list-group-item">Address:  [<b>{{ $supplier->address }}</b>]</a>
  <a href="#" class="list-group-item">Phone:  [<b>{{ $supplier->phone }}</b>]</a>
  <a href="#" class="list-group-item">Email:  [<b>{{ $supplier->email }}</b>]</a>
  <a href="#" class="list-group-item">Account:  [<b>{{ $supplier->account }}</b>]</a>
  <a href="#" class="list-group-item">note:  <br>[<b>{{ $supplier->account }}</b>]</a>
  <a href="#" class="list-group-item">Items:  [<b>5</b>]</a>
  <a href="#" class="list-group-item">Recevings:  [<b>3</b>]</a>
</div>
<div class="col-md-5">
  <h3>Items</h3>
</div>
<div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12">
  <table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
      <th>ID</th>
      <th>name</th>
      <th>Quantity</th>
      <th>Price</th>
      @can('edit_items', 'deletes')
        <th class="text-center">Actions</th>
      @endcan
    </thead>
    <tbody>
      @foreach ($supplier->items as $item)
        <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->price }}</td>


        @can('edit_posts', 'delete_posts')
        <td class="text-center">
            @include('shared._actions', [
                'entity' => 'items',
                'id' => $item->id
            ])
        </td>
        @endcan
    </tr>
      @endforeach
    </tbody>
  </table>
</div>
