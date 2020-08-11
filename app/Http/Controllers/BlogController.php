<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex(){
        $posts= Post::paginate(10);
        foreach($posts as $post){
            $post->body = str_replace("<p>", "", $post->body);
            $post->body = str_replace("</p>", "", $post->body);
            $post->body = str_replace("font-size", "", $post->body);
        }
        return view('blogs.index')->with('posts',$posts);
    }

    public function getBlog($id)
    {
        // Find is "where" using $id only
        $post     = Post::find($id);
        $comments = $post->comments()->paginate(5);
        // with('variable', $value), to use the variable in blade,
        // write 'variable' as $variable
        return view('blogs.show')->with('post',$post)->with('comments',$comments);
    }

}
