<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getIndex() {
        return view('welcome');
    }

    public function getAbout() {
        $data = [];
        $data['email'] = '2301788091@qq.com';
        $data['fullname'] = 'TC Hsieh';
        return view('about')->with("data",$data);
    }

    public function getContact() {
        return view('contact');
    }

    public function postContact() {
        
    }
}

?>