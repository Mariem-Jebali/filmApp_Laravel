<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index()
    {  
        $categories = Category::latest()->paginate(5);
        return view('categories.index', compact('categories')) ;
       
    }

 
    public function create()
    {
        return view('categories.create');
    }

  
    public function store()
    {
        $dep = new Category();
        $dep->name = request('name');
        $dep->save();
        return redirect()->route('categories.index')->with('success', 'category created with success');
       // return response(null, 201);
       /* $request->validate(['name'=>'required|max:50']);
        Category::create($request->all());
        return response(null, 201);*/
    }


    public function edit(Category $category)
    {
        return view ('categories.edit',compact('category'));
    }

  
    public function update(Request $request,Category $category)
    {
        $request->validate([ 
            'name'=>'required',
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'category updated with success');
      
    }
  
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','category deleted with success');
     
        /*
        //sans attribue en parametre
         try {
            Category::destroy(request('id'));
            return response(null, 200);
        } catch (\Exception $e) {
            return response(null, 500);
        }*/
    }
}
