<input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
<!-- item_categorie_id Form Input -->
<div class="form-group @if ($errors->has('expense_categorie_id')) has-error @endif">
    {!! Form::label('categorie', 'categorie') !!}
    {!! Form::select('expense_categorie_id', $expense_categories, old('expense_categorie_id'), ['class' => 'form-control']) !!}
    @if ($errors->has('expense_categorie_id')) <p class="help-block">{{ $errors->first('expense_categorie_id') }}</p> @endif
</div>
<!-- entry_date Form Input -->
<div class="form-group @if ($errors->has('entry_date')) has-error @endif">
    {!! Form::label('entry_date', 'entry_date') !!}
    {!! Form::date('entry_date', null, ['class' => 'form-control', 'placeholder' => 'entry_date']) !!}
    @if ($errors->has('entry_date')) <p class="help-block">{{ $errors->first('entry_date') }}</p> @endif
</div>
<!-- amount Form Input -->
<div class="form-group @if ($errors->has('amount')) has-error @endif">
    {!! Form::label('amount', 'amount') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'amount']) !!}
    @if ($errors->has('amount')) <p class="help-block">{{ $errors->first('amount') }}</p> @endif
</div>
<!-- amount Form Input -->
<div class="form-group @if ($errors->has('note')) has-error @endif">
    {!! Form::label('note', 'note') !!}
    {!! Form::text('note', null, ['class' => 'form-control', 'placeholder' => 'note']) !!}
    @if ($errors->has('note')) <p class="help-block">{{ $errors->first('note') }}</p> @endif
</div>


<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $expense ])
@endif
