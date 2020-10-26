@extends('layout')

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}} </p>
        </div>
    @endif

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Categories</p>
            <a class="button is-info" href="{{ route('categories.create') }}">ADD category</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                        <tr>
                              <th>Id</th>
                            <th>Nom</th>
                            <th  width="250px" > Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                        <td>{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                           <td>
                         <form action="{{route( 'categories.destroy', $category->id) }}" method="POST">
                           <a href="{{route('categories.edit',  $category->id) }}" class="btn btn-success"> Edit </a>

                            @csrf
                            @method('DELETE')

                           <button type="submit" class="btn btn-danger"> delete</button>
                          </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer is-centered">
            {{ $categories->links() }}
        </footer>
    </div>
@endsection