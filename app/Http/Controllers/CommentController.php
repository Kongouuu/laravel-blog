<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    /**
     * The comment function is so far for guest-only
     * Which means there will be no need for editing functions
     * Also views are not required for this controller
     * As this is attached to post
     */

    public function store(Request $request, $post_id)
    {
        // validate
        $this->validate($request,[
            'name'           => 'required|max:100',
            'email'          => 'required|email|max:150',
            'comment'        => 'required|min:5|max:3000'   
        ]);

        // store
        $comment = new Comment;
        $comment->name     = $request->name;
        $comment->email    = $request->email;
        $comment->comment  = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post_id);
        $comment->save();

        // sync for association is after save
        // First parameter is what to bind
        // Second parameter is to overwrite or not

        // flash
        session()->flash('success','The comment is successfully created!');

        // redirect
        return redirect()->route('blogs.show', [$post_id]);
    }

    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('success','The comment is successfully deleted!');

        return redirect()->back();
    }
}
