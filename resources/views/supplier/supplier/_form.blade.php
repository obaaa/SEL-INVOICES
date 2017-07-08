<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- address Form Input -->
<div class="form-group @if ($errors->has('address')) has-error @endif">
    {!! Form::label('address', 'address') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'address']) !!}
    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
</div>

<!-- phone Form Input -->
<div class="form-group @if ($errors->has('phone')) has-error @endif">
    {!! Form::label('phone', 'phone') !!}
    {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
    @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- account Form Input -->
<div class="form-group @if ($errors->has('account')) has-error @endif">
    {!! Form::label('account', 'account') !!}
    {!! Form::number('account', null, ['class' => 'form-control', 'placeholder' => 'account']) !!}
    @if ($errors->has('account')) <p class="help-block">{{ $errors->first('account') }}</p> @endif
</div>

<!-- note Form Input -->
<div class="form-group @if ($errors->has('note')) has-error @endif">
    {!! Form::label('note', 'note') !!}
    {!! Form::text('note', null, ['class' => 'form-control', 'placeholder' => 'note']) !!}
    @if ($errors->has('note')) <p class="help-block">{{ $errors->first('note') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $supplier ])
@endif
