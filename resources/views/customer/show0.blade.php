<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="showModalLabel">show</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover" id="data-table">
          <tr>
            <th>entry date</th><td class="entry_date"></td>
          </tr>
          <tr>
            <th>customer</th><td class="customerModal"></td>
          </tr>
          <tr>
            <th>invoice no</th><td class="invoice_idModal"></td>
          </tr>
          <tr>
            <th>total</th><td class="tootalModal"></td>
          </tr>
          <tr>
            <th>amount recipie</th><td class="amount_recipieModal"></td>
          </tr>
          <tr>
            <th>amount remain</th><td class="amount_remainModal"></td>
          </tr>
        </table>
        <h3>Items</h3>
        <table class="table table-bordered table-striped table-hover " id="data-table">
            <thead>
            <tr>
                <th>item</th>
                <th>package</th>
                <th>quantity</th>
                <th>amount</th>
                <th>expir date</th>
            </tr>
            </thead>
            <tbody class="showModalLabelTable">
{{--  --}}
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- Submit Form Button -->
      </div>
    </div>
  </div>
</div>
