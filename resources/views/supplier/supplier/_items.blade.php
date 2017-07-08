<br><br>
<div class="row">
  <table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
      <th>ID</th>
      <th>Date</th>
      <th>Total cost</th>
      <th>remaining cost</th>
      @can('edit_items', 'deletes')
        <th class="text-center">Actions</th>
      @endcan
    </thead>
    <tbody>
      <td>120</td>
      <td>00-00-0000</td>
      <td>000</td>
      <td>000</td>
      @can('edit_items')
      <td class="text-center">
        @can('edit_users')
            {{-- <a href="#" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> --}}
            <a href="#" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> payment</a>
            <a href="#" class="btn btn-xs btn-info"><i class="fa fa-glass"></i> show</a>
        @endcan
      </td>
      @endcan
    </tbody>
  </table>
</div>
