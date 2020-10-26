@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add film</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('films.index')}}" title="Go back">back </a>
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

    <form action="{{ route('films.update',$film->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="field">

                        <label class="label">Catégories</label>
                        <div class="select is-multiple">
                            <select name="categories[]" multiple="true">
                            <?php $categories = App\Models\Category::all() ?>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach 
                            </select>
                        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $film->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection