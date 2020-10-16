<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $name = 'Yashub';
        $users = array(
            "name" => "Yashub Armando",
            "email" => "yashubge@gmail.com",
            "phone" => "8341257856"
        );
        return view('user',compact('name','users'));
    }
}
