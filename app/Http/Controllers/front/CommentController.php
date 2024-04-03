<?php

namespace App\Http\Controllers\front;

use App\Models\front\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\front\Product;
use App\Models\User;
use App\Notifications\CommentNotification;
use Exception;
use Notification;
use Illuminate\Http\Request;
use Inertia\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Product $product,Request $request)
    {
        $validateData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ]);
        try{
            $comment=$product->comments()->create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('wrong',$exception->getCode());
        }
        $msg='کامنت مورد نظر با موفقیت ثبت شد و پس از بررسی مدیر به نمایش در می آید';
        $user=User::where('id',$request->user_id)->get();
        Notification::send($user,new CommentNotification($product,$request));
        return redirect()->back()->with('success',$msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment=new Comment();
        $validateData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ]);
        try{
         $comment->update($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('wrong',$exception->getCode());
        }
        $msg='کامنت مورد نظر با موفقیت ثبت شد و پس از بررسی مدیر به نمایش در می آید';
        return redirect()->back()->with('success',$msg);
    }
    // فعلا از این استفاده نخواهیم کرد تا زمانی که پنل و قابلیت ویرایش انجام شود

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}