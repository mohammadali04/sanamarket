<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\front\Basket;
use App\Models\front\Category;
use App\Models\front\Comment;
use App\Models\front\Product;
use App\Models\front\slider;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $slider = Slider::where('product_id', $product->id)->get();
        $comments = Comment::where('product_id', $product->id)->get();
        $product->increment('hit');
        return view('front.product.index', compact('product', 'slider', 'comments'));
    }
    //برای افزودن دسته در صفحه بلید اگر خواستی پارامتر دسته را در پارامتر او این متد و روت مربوطه اضافه کن
    public function addToBasket(Request $request, Product $product)
    {
        $basket_cookie = parent::getCookieBasket();
        $product_basket = Basket::where([['product_id',$product->id],['cookie', $basket_cookie]])->first();
        $basket = new Basket();
        if (isset($product_basket)) {
            $product_basket->tedad=$product_basket->tedad+$request->tedad;
            $product_basket->save();
            $msg='محصول مورد نظر با موفقیت بروزرسانی شد';
        }
        else{
            $basket->create(['product_id' => $product->id, 'tedad' => $request->tedad, 'cookie' => $basket_cookie]);
            $msg='محصول مورد نظر با موفقیت به سبد خرید شما اضافه شد';
        }
        return redirect()->back()->with('success',$msg);
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}