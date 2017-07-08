<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="paymentModalLabel">payment</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover" id="data-table">
          <tr>
            <th>supplier</th><td class="supplierModal"></td>
          </tr>
          <tr>
            <th>invoice no</th><td class="invoice_noModal"></td>
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
        {!! Form::open(['url' => ['payment_bill'] ]) !!}
          <label for="payment">payment: </label>
          <input type="hidden" class="bill_id" name="bill_id">
          <input class="form-control" required type="number" name="payment">
          {!! Form::submit('pay', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- Submit Form Button -->
      </div>
    </div>
  </div>
</div>
