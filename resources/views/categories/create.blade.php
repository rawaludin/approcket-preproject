@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New Category</h3>
        {!! Form::open(['route' => 'categories.store'])!!}
          @include('categories._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
