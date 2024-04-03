<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Product;
use App\Models\back\slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=slider::all();
        return view('back.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,Product $product)
    {
        return view('back.slider.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider=new Slider();
        try{
            $slider->create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موفقیت ثبت شد';
        return redirect(route('admin.product.index'))->with('success',$msg);
        
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
    public function edit(Request $request,slider $slider)
    {
        return view('back.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slider $slider)
    {
        try{
            $slider->update($request->all());
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت ویرایش شد';
        return redirect(Route('admin.slider.index'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            Slider::destroy($request->ids);
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت حذف شد';
        return redirect(Route('admin.slider.index'))->with('success',$msg);
    }
}
