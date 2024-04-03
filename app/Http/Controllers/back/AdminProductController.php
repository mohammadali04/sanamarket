<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Category;
use App\Models\back\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('back.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories=Category::all();
        return view('back.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
            'img'=>'required',
            'price'=>'required',
            'weight'=>'required',
            'discount'=>'required',
            'hit'=>'required',
        ]);
        $product=new Product();
        if(empty($request->slug)){
            $slug=SlugService::createSlug(Product::class, 'slug',$request->title);
        }else{
            $slug=SlugService::createSlug(Product::class, 'slug',$request->slug);
        }
        $request->merge(['slug' => $slug]);
        try{
            $product=$product->create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موفقیت ثبت شد';
        return redirect(route('admin.slider.create',$product->id))->with('success',$msg);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Product $product)
    {
       $categories = Category::all();
        return view('back.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try{
            $product->update($request->all());
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت ویرایش شد';
        return redirect(Route('admin.product.index'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            Product::destroy($request->ids);
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت حذف شد';
        return redirect(Route('admin.product.index'))->with('success',$msg);
    }
}
