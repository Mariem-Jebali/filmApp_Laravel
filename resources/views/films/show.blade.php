@extends('layout')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Titre : {{ $film->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
               
                <hr>
                <p>Catégories :</p>
                <ul>
                    @foreach($film->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                <hr>
            
            </div>
        </div>
    </div>
@endsection