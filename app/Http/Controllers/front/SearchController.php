<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\front\Category;
use App\Models\front\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $products=Product::paginate(4);
        return view('front.category.index',compact('products'));
    }
    public function search(Request $request){
        $data=$request->keyword;
       return  redirect(route('search.display'))->with('res',$data);
            
    }
    public function displaySearch(Request $request){
        $data=$request->session()->get('res');
        $products = Product::where('title','like',$data.'%')->paginate(4);
        return view('front.search.index',compact('products'));

    }
   
}