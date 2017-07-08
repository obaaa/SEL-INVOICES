{{-- ['USK', 'barcode', 'name', 'image', 'quantity', 'price', 'note', 'active', 'supplier_id', 'item_categorie_id', 'item_attribute_id'] --}}
<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- USK Form Input -->
<div class="form-group @if ($errors->has('USK')) has-error @endif">
    {!! Form::label('USK', 'USK') !!}
    {!! Form::text('USK', null, ['class' => 'form-control', 'placeholder' => 'USK']) !!}
    @if ($errors->has('USK')) <p class="help-block">{{ $errors->first('USK') }}</p> @endif
</div>

<!-- barcode Form Input -->
<div class="form-group @if ($errors->has('barcode')) has-error @endif">
    {!! Form::label('barcode', 'barcode') !!}
    {!! Form::text('barcode', null, ['class' => 'form-control', 'placeholder' => 'barcode']) !!}
    @if ($errors->has('barcode')) <p class="help-block">{{ $errors->first('barcode') }}</p> @endif
</div>

<!-- image Form Input -->
<div class="form-group @if ($errors->has('image')) has-error @endif">
    {!! Form::label('image', 'image') !!}
    {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
    @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
</div>
{{--  --}}
<!-- quantity Form Input -->
<div class="form-group @if ($errors->has('quantity')) has-error @endif">
    {!! Form::label('quantity', 'quantity') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'quantity']) !!}
    @if ($errors->has('quantity')) <p class="help-block">{{ $errors->first('quantity') }}</p> @endif
</div>

<!-- price Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('price', 'price') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'price']) !!}
    @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
</div>

<!-- supplier_id Form Input -->
<div class="form-group @if ($errors->has('supplier_id')) has-error @endif">
    {!! Form::label('supplier', 'supplier') !!}
    {!! Form::select('supplier_id', $suppliers, old('$suppliers'), ['class' => 'form-control']) !!}
    @if ($errors->has('supplier_id')) <p class="help-block">{{ $errors->first('supplier_id') }}</p> @endif
</div>

<!-- item_categorie_id Form Input -->
<div class="form-group @if ($errors->has('item_categorie_id')) has-error @endif">
    {!! Form::label('categorie', 'categorie') !!}
    {!! Form::select('item_categorie_id', $item_categories, old('$item_categories'), ['class' => 'form-control']) !!}
    @if ($errors->has('item_categorie_id')) <p class="help-block">{{ $errors->first('item_categorie_id') }}</p> @endif
</div>

<!-- item_attribute_id Form Input -->
<div class="form-group @if ($errors->has('item_attribute_id')) has-error @endif">
    {!! Form::label('attribute', 'attribute') !!}
    {!! Form::select('item_attribute_id', $item_attributes, old('$item_attributes'), ['class' => 'form-control']) !!}
    @if ($errors->has('item_attribute_id')) <p class="help-block">{{ $errors->first('item_attribute_id') }}</p> @endif
</div>

<!-- active Form Input -->
<div class="form-group @if ($errors->has('active')) has-error @endif">
    {!! Form::label('active', 'active') !!}
    {!! Form::select('active',['0','1'], old('$item_attributes'), ['class' => 'form-control', 'placeholder' => 'active']) !!}
    @if ($errors->has('active')) <p class="help-block">{{ $errors->first('active') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $supplier ])
@endif
