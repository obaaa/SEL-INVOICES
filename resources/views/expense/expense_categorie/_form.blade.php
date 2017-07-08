<!-- item_categorie_id Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $expense_categorie ])
@endif
