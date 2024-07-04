<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessioncontroller extends Controller
{
    function sessionput(Request $req)
    {
       $req->session()->put('email', $req->email);
        $req->session()->put('name', $req->name);
        //return 'email'." ".'name';
        return $req->header();
    }

    function sessionpull(Request $req)
    {
        $email = $req->session()->pull('email' , 'no email found');
        $name =  $req->session()->pull('name' , 'no name found');
        return [
            'name' => $name,
            'email' => $email,
        ];
    }
    function sessionget(Request $req)
    {
        $email = $req->session()->get('email');
        $name =  $req->session()->get('name');
        return [
            'name' => $name,
            'email' => $email,
        ];
    }

    function sessionforget(Request $req):string
    {
        $req->session()->forget('email');

        return "session forget";
    }

    function sessionflush(Request $req):string
    {
        $req->session()->flush();
        return "session flush";
    }
}
