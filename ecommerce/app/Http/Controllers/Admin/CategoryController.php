<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $categories = Category::with('children')->where('parent_id',0)->get();
        
        return view('Admin.categories.index')->with([
          'categories'  => $categories 
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
       $request->validate([
        'name' => 'required|min:3|max:255|string',
        'parent_id' => 'sometimes|nullable|numeric'
    
         ]);
     
         $input = $request->all();
         $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
          
         Category::create($input);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
          $category=Category::find($id);
        return view('Admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric'
        
             ]);
         
             $input = $request->all();
             $category=Category::find($id);
             $category->name=$input['name'];
            

               $category->save();
             
    
            return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
       $category->delete();
        return redirect()->route('category.index');
    }
}
