<!-- Modal -->
<div class="modal fade" id="expense_categorieModal" tabindex="-1" role="dialog" aria-labelledby="expense_categorieModalLabel">
    <div class="modal-dialog" role="document">
      {!! Form::open(['route' => ['expense_categories.store'] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="expense_categorieModalLabel">Expense</h4>
            </div>
            <div class="modal-body">
              @include('expense.expense_categorie._form')
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
