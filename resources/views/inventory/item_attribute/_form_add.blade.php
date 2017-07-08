<!-- Modal -->
<div class="modal fade" id="attributeModal" tabindex="-1" role="dialog" aria-labelledby="attributeModalLabel">
    <div class="modal-dialog" role="document">
      {!! Form::open(['route' => ['item_attributes.store'] ]) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="attributeModalLabel">attribute</h4>
            </div>
            <div class="modal-body">
              <!-- Name Form Input -->
              <div class="form-group @if ($errors->has('name')) has-error @endif">
                  {!! Form::label('name', 'Name') !!}
                  {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                  @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
              </div>
              <!-- Permissions -->
              @if(isset($user))
                  @include('shared._permissions', ['closed' => 'true', 'model' => $item_attribute ])
              @endif
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
