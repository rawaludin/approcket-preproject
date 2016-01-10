@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Search products</h3>
          </div>
          <div class="panel-body">
            {!! Form::open(['url' => 'catalogs', 'method'=>'get']) !!}
                <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                  {!! Form::label('q', 'What are you looking for?') !!}
                  {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control']) !!}
                  {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                </div>

                {!! Form::hidden('cat', isset($selected_category) ? $selected_category->id : '') !!}

              {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Filter by category</h3>
          </div>
          <ul class="nav nav-pills nav-stacked">
            <li ><a href="/catalogs">All Products</a></li>
            @foreach(App\Category::all() as $category)
              <li ><a href="{{ url('/catalogs?cat=' . $category->id)}}">{{ $category->title }}
              {{ $category->total_products > 0 ? '(' . $category->total_products . ')' : ''}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12"><h1>Category : {{ isset($selected_category) ? $selected_category->title : 'All'}}</h1></div>
          @forelse ($products as $product)
            <div class="col-md-6">
              <h3>{{ $product->name }}</h3>
              <div class="thumbnail">
                <img src="{{ $product->photo_path }}" class="img-rounded">
                  <p>Model: {{ $product->model }}</p>
                  <p>Category:
                    @foreach ($product->categories as $category)
                      <a href="{{ url('/catalogs?cat=' . $category->id)}}">
                        <span class="label label-primary">
                        <i class="fa fa-btn fa-tags"></i>
                        {{ $category->title }}</span>
                      </a>
                    @endforeach
                  </p>
              </div>
            </div>
          @empty
            <div class="col-md-12 text-center">
              <h1>:(</h1>
              <p>We can't find what you're looking for.</p>
            </div>
          @endforelse


          <div class="pull-right">{!! $products->links() !!}</div>
        </div>
      </div>
    </div>
  </div>



@endsection
