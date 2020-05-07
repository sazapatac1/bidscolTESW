<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $data = [];
        $data["title"] = "Show comments";
        $data["comments"] = Comment::orderBy("id")->get();

        return view('comment.index')->with("data", $data);
    }


    public function create()
    {
        $data = [];
        $data["title"] = "Create comment";

        return view('comment.create')->with("data", $data);
    }


    public function store(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["description","user_id","item_id"]));
        return back()->with('success','Comment created successfully!');
    }

    function show($id)
    {
        $data = [];
        $data["title"] = "Show comment";
        $data["comment"] = Comment::find($id);

        return view('comment.show')->with("data", $data);
    }


    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit comment";
        $data["comment"]=Comment::find($id);
        return view('comment.edit')->with("data", $data);
    }


    public function update(Request $request, Comment $comment)
    {
        Comment::validate($request);
        $comment->update($request->all());
        return redirect()->route('comment.index')->with('succes','Comment update successfully');
    }


    public function destroy($id)
    {
        Comment::destroy($id);
        return back()->with('success','Comment deleted successfully!');
    }
}
