@extends('layout')

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}} </p>
        </div>
    @endif

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Films</p>
            <a class="button is-info" href="{{ route('films.create') }}">ADD film</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                        <tr>
                              <th>Id</th>
                            <th>Nom</th>
                            <th>categories</th>
                            <th  width="250px" > Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                        <tr>
                        <td>{{ $film->id }} </td>
                          <td><strong>{{ $film->name }}</strong></td>
                      <td> 
                      <ul>
                            @foreach($film->categories as $category)
                             <li>{{ $category->name }}</li>
                            @endforeach
                       </ul>
                     </td>
                           <td>
                         <form action="{{route( 'films.destroy', $film->id) }}" method="POST">
                         <a href="{{route('films.show', $film -> id) }} " title="show" class="btn btn-info"> Show</a>
                           <a href="{{route('films.edit', $film-> id)}}" class="button is-warning"> Edit </a>

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
            {{ $films->links() }}
        </footer>
    </div>
@endsection