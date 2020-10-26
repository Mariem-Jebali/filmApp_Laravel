@extends('layout')

@section('content')
<div class="card">
        <header class="card-header">
            <p class="card-header-title">Bonjour</p>
           
           
        </header>
        <div class="card-content">
            <div class="content">
      <div class="field">
      <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div style="margin-left:350px;">
              
                <a class="button is-warning" href="{{route('films.index')}}" title="films">films</a>
                <a class="btn btn-success" href="{{route('categories.index')}}" title="categories">categories</a>
            </div>
        </div>
       </div>
        </div>
        </div></div>
<footer class="card-footer is-centered" >

</footer>
   

@endsection
