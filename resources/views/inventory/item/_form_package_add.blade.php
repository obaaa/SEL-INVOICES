<div class="modal fade" id="item_packageModal" tabindex="-1" role="dialog" aria-labelledby="item_packageModalLabel">
    <div class="modal-dialog" role="document">
      {!! Form::open(['route' => ['item_packages.store'] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="item_packageModalLabel">Package</h4>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name*') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
                </div>
                {{-- <div class="col-lg-3 col-md-3"> --}}
                  <input type="hidden" name="item_id" value="{{ $item->id }}">

                {{-- </div> --}}
                <div class="col-lg-4 col-md-4">
                  <div class="form-group @if ($errors->has('quantity')) has-error @endif">
                      {!! Form::label('quantity', 'quantity') !!}
                      {!! Form::number('quantity', 0, ['class' => 'form-control', 'placeholder' => 'no']) !!}
                      @if ($errors->has('quantity')) <p class="help-block">{{ $errors->first('quantity') }}</p> @endif
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group @if ($errors->has('discount')) has-error @endif">
                      {!! Form::label('discount', 'discount') !!}
                      {!! Form::number('discount', 0, ['class' => 'form-control', 'placeholder' => 'no']) !!}
                      @if ($errors->has('discount')) <p class="help-block">{{ $errors->first('discount') }}</p> @endif
                  </div>
                </div>
                <!-- Permissions -->
                @if(isset($user))
                    @include('shared._permissions', ['closed' => 'true', 'model' => $item_package ])
                @endif
                  {{-- {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!} --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
