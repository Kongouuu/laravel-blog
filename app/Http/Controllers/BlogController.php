<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex(){
        $posts= Post::paginate(10);
        return view('blogs.index')->with('posts',$posts);
    }

    public function getBlog($id)
    {
        // Find is "where" using $id only
        $post= Post::orderBy('created_at', 'desc')->first();

        // with('variable', $value), to use the variable in blade,
        // write 'variable' as $variable
        return view('blogs.show')->with('post',$post);
    }

}
