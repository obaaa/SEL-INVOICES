<!-- Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel">
    <div class="modal-dialog" role="document">
      {!! Form::open(['route' => ['expenses.store'] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="expenseModalLabel">Expense</h4>
            </div>
            <div class="modal-body">
              @include('expense._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>
          </div>
            {!! Form::close() !!}
    </div>
</div>
