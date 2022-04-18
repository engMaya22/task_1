<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $categories = Category::with('children')->where('parent_id',0)->get();
         $counter=0;
         return view('home')->with([
          'categories' => $categories,
          'counter'=>$counter
          ]);
    }
    public function admin()
    {
        return view('backend.layouts.app');
    }
}
