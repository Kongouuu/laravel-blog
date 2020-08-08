<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Mail\SendContact;
use App\Mail\SendCredit;


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

    public function postContact(Request $request) {
        $this->validate($request,[
            'email'       => 'required|email|max:255',
            'subject'     => 'required|max:255',
            'message'     => 'required|max:10000'   
        ]);

        $data = [
            'email'   => $request->email,
            'subject' => $request->subject,
            'body'    => $request->message
        ];


        // Send an acknowledge email to the user
        Mail::to($request->email)->send(new SendCredit($request->subject));
        // Send an email to the admin about the message
        Mail::to('myMail@gmail.com')->send(new SendContact($data));

        session()->flash('success','The message is successfully created!');
        return back();
    }
}

?>