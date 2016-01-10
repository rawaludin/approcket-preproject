@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                @if (Auth::guest())
                <div class="panel-body">
                    Please login to view catalog.
                    <ul>
                        <li>Admin: admin@gmail.com | secret</li>
                        <li>Customer: customer@gmail.com | secret</li>
                    </ul>
                </div>
                @else
                <div class="panel-body">
                    You're logged in.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
