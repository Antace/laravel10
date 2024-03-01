<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $blogs = [
            [
                'title' => "Blog 1",
                'content' => "Content 1",
                'status' => true
            ],
            [
                'title' => "Blog 2",
                'content' => "Content 2",
                'status' => false
            ],
            [
                'title' => "Blog 3",
                'content' => "Content 3",
                'status' => true
            ]
        ];
        return view('blog', compact('blogs'));
    }

    function about(){
        $name = "Anuthep";
        $date = date('d-M-y');
        return view('about', compact('name', 'date'));
    }

    function create(){
        return view('form');
    }

    function insert(Request $request){
        $request->validate([
            'title'=>'required|max:50',
            'content'=>'required'
        ]);
    }

}

    
