<!-- Modal -->
<div class="modal fade" id="categorieModal" tabindex="-1" role="dialog" aria-labelledby="categorieModalLabel">
    <div class="modal-dialog" role="document">
      {!! Form::open(['route' => ['item_categories.store'] ]) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="categorieModalLabel">categorie</h4>
            </div>
            <div class="modal-body">
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
