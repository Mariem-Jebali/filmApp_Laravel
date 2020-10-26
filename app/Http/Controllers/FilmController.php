<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View ; 
use DB;
use App\Http\Controllers\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\{Category,Film};
class FilmController extends Controller
{
    

  
    public function index()
    {  
         /* return $films=  Film::with(['categories'])->get()->map(function($item){
           return (object)array('id'=> $item->id, 'film_name'=> $item->name,
           'category_name' => $item->categories[0]->name);
       });*/
       
      //return Film::with('categories')->get();
       $films = Film::latest()->paginate(4);
       return view('films.index', compact('films')) ;
    }

    public function show(Film $film)
    {
        return view ('films.show',compact('film'));
    }
   
    public function create()
    {
        return view ('films.create');
    }

    public function store(Request $request)
    {
        $film = Film::create($request->all());
        $film->categories()->attach($request->categories);
       return redirect()->route('films.index')->with('success', 'film created with success');
    }

    public function edit(Film $film)
    {
        return view ('films.edit',compact('film'));
    }

   
    public function update(Request $request, Film $film)
    {
    $film->update($request->all());
    $film->categories()->sync($request->categories); //syn va supprimer les id dans catg_fim et remplace par nouveau id
   return redirect()->route('films.index')->with('success', 'film created with success');
   
        
    //$film->update($filmRequest->all());
      //  $film->categories()->sync($filmRequest->cats);
      // return redirect()->route('films.index')->with('success', 'film created with success');
    }
    
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'film created with success');
    }
}
