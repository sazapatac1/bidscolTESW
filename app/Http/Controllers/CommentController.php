<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["description","user_id","item_id"]));
        return back()->with('success',@lang('commentcontroller.Comment_created_successfully'));
    }

    public function showList()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Comments";
        $orderBy = 'id';
        $data["comments"] = Comment::orderBy($orderBy,'asc')->get();
        return view('comment.list')->with("data",$data);
        
    }

    public function editOne($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit')->with('comment',$comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $comment = Comment::findOrFail($request->comment_id);
        $comment->setDescription($request->description);
        $comment->save();
        return redirect()->route('comment.list')->with('success', @lang('commentcontroller.Comment_edited'));
    }

    public function deleteOne($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete(); 
        return back()->with('success', @lang('commentcontroller.Comment_deleted'));
    }


    
}
