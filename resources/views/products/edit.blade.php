@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Edit {{ $product->title }}</h3>
        {!! Form::model($product, ['route' => ['products.update', $product], 'method' =>'patch', 'files' => true])!!}
          @include('products._form', ['model' => $product])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
