<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- color Form Input -->
<div class="form-group @if ($errors->has('color')) has-error @endif">
    {!! Form::label('color', 'Color') !!}
    {!! Form::color('color', old('color'), ['class' => 'form-control', 'placeholder' => 'color']) !!}
    @if ($errors->has('color')) <p class="help-block">{{ $errors->first('color') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $item_categorie ])
@endif
