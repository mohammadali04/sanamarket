<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use App\Models\back\Category;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories=Category::where('parent',0)->get();
        return view('back.category.index',compact('categories'));
    }
    public function getParents(Category $category){
        $allParents=[];
        $parentId=$category->parent;
        while($parentId!=0){
                $parentIdcategory=Category::where('id',$parentId)->get();
                array_push($allParents,$parentIdcategory);
                $parentId=$parentIdcategory[0]['parent'];
        }
        return $allParents;

    }
    public function showChildren(Category $category){
        $categoryParents=$this->getParents($category);
        $parents=array_reverse($categoryParents);
        $categories=$category->children()->get();
        return view('back.category.index',compact('categories','parents','category'));

    }
    public function create(){
        $categories=Category::all();
        return view('back.category.create',compact('categories'));
    }
    public function store(Request $request){
        $messages=['title.required' => 'عنوان دسته را ووارد کنید',];
        $validationData=$request->validate([
            'title' => 'required',
        ],$messages);
        $category=new Category();
        try{
        $category->create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());        
        }
            $msg='دسته ی مورد نظر با موفقیت اضافه شد';
            return redirect(Route('admin.category.index'))->with('success',$msg);
    }
    public function edit(Category $category){
        $categories=Category::all();
        return view('back.category.edit',compact('categories','category'));
    }
    public function update(Request $request,Category $category){
        $messages=['title.required' => 'عنوان دسته را ووارد کنید',];
        $validationData=$request->validate([
            'title' => 'required',
        ],$messages);
        try{
            $category->update($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='دسته ی مورد نظر با موفقیت ویرایش شد';
        return redirect(route('admin.category.index'))->with('success',$msg);

    }
    public function getChildrenIds($ids=[]){
        $allChildren=[];
        foreach($ids as $id){
            $children=Category::where('parent',$id)->get();
            foreach($children as $child){
                array_push($allChildren,$child->id);
            }
        }
        return $allChildren;

    }
    public function destroy(Request $request){
        $allChildrenIds=[];
        $allChildrenIds=array_merge($allChildrenIds,$request->ids);
        $requestIds=$request->ids;
        while(sizeof($requestIds)>0){
            $allChildren=$this->getChildrenIds($requestIds);
            $allChildrenIds=array_merge($allChildrenIds,$allChildren);
            $requestIds=$allChildren;

        }
        Category::destroy($allChildrenIds);
        $msg='دسته های مورد نظر با موفقیت حذف شد';
        return redirect()->back()->with('success',$msg);
    }
}