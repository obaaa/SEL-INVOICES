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
        {!! Form::open(['url' => ['payment_invoice'] ]) !!}
          <label for="payment">payment: </label>
          <input type="hidden" class="invoice_id" name="invoice_id">
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
