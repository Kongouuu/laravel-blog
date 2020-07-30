<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

    public function getIndex() {
        // order by created_at in descending order
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages/homepage')->with('posts', $posts);
    }

    public function getAbout() {
        return view('pages/about');
    }

    public function getContact() {
        return view('pages/contact');
    }

    public function postContact() {
        
    }
}

?>