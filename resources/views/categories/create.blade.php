@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('categories.index')}}" title="Go back">back </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Categories</p>
        
        </header>
        <div class="card-content">
            <div class="content">
    <form action="{{ route('categories.store') }}" method="POST">
    @csrf
  
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name"  class="form-control" placeholder="Name">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
    </div>
        </div>
@endsection