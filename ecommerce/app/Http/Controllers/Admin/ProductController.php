<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use   App\Models\Category;
use   App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        $categories = Category::with('children')->where('parent_id',0)->get();
        return view('Admin.products.index',compact('categories','products'));
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo_url' => 'required',     
        ]);
          
           
        $product=new Product();
        
        if ($image = $request->file('photo_url')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->photo_url = $imageuploaded;
        }
        $product->title=$request->title;
        $product->description= $request->description;
        $product->price= $request->price;
      $product->category_id=$request->category_id;
       
        $product->save();
        return redirect()->route('product.index');

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
        $categories = Category::with('children')->where('parent_id',0)->get();
        $product=Product::find($id);
        return view('Admin.products.edit',compact('product','categories'));
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
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
           
            

           
        ]);
        // dd($request);
        $product=Product::find($id);
        
        if ($image = $request->file('photo_url')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->photo_url = $imageuploaded;
            
        }
      
     
        $product->title=$request->title;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->category_id=$request->category_id;
        $product->save();
        return redirect()->route('product.index');
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
        $product = Product::find($id);

        $product->delete();
       
        return redirect()->route('product.index');
    }
}
