<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pagination (show 10 per page)
        $posts = Post::paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('posts/create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request,[
            'title'       => 'required|max:100',
            'category_id' => 'required|integer',
            'body'        => 'required|max:15000'   
        ]);

        // store
        $post = new Post;
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->category_id = $request->category_id;
        $post->save();

        // sync for association is after save
        // First parameter is what to bind
        // Second parameter is to overwrite or not
        $post->tags()->sync($request->tags, false);

        // flash
        session()->flash('success','The post is successfully created!');

        // redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find is "where" using $id only
        $post = Post::find($id);
        // with('variable', $value), to use the variable in blade,
        // write 'variable' as $variable
        return view('posts/show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        return view('posts/edit')->with('post',$post)->with('categories', $categories)->with('tags',$tags);
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
        $this->validate($request,[
            'title' => 'required|max:100',
            'category_id' => 'required|integer',
            'body'  => 'required|max:15000'
        ]);

        // store
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->body  = $request->body;
        $post->save();

        // Overwrite, therefore no need "false"
        $post->tags()->sync($request->tags);
        // flash
        session()->flash('success','The post is successfully updated!');

        // redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Delete relation
        $post->tags()->detach();
        $post->comments()->delete();
        $post->delete();

        session()->flash('success','The post is successfully deleted!');
        
        return redirect()->route('posts.index');
    }
}
