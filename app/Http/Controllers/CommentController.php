<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
