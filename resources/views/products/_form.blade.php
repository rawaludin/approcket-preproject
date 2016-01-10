<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('model') ? 'has-error' : '' !!}">
  {!! Form::label('model', 'Model') !!}
  {!! Form::text('model', null, ['class'=>'form-control']) !!}
  {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
  {!! Form::label('category_lists', 'Parent') !!}
  {{-- Simplify things, no need to implement ajax for now --}}
  {!! Form::select('category_lists[]', [''=>'']+App\Category::lists('title','id')->all(), null, ['class'=>'form-control js-selectize-multiple', 'multiple']) !!}

  {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
