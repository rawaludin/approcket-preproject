@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New Product</h3>
        {!! Form::open(['route' => 'products.store', 'files' => true])!!}
          @include('products._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
