<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Baner;
use App\Models\back\Category;
use Illuminate\Http\Request;

class AdminBanerController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baners=Baner::all();
        return view('back.baner.index',compact('baners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('back.baner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baner=new Baner();
        try{
            $baner->create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='بنر مورد نظر با موفقیت ثبت شد';
        return redirect(route('admin.baner.index'))->with('success',$msg);
        
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
    public function edit(Request $request,baner $baner)
    {
        return view('back.baner.edit',compact('baner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, baner $baner)
    {
        try{
            $baner->update($request->all());
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت ویرایش شد';
        return redirect(Route('admin.baner.index'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            Baner::destroy($request->ids);
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت حذف شد';
        return redirect(Route('admin.baner.index'))->with('success',$msg);
    }
}
