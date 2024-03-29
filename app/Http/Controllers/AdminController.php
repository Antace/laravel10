<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    function index()
    {
        $blogs = DB::table('blogs')->paginate(10);
        return view('blog', compact('blogs'));
    }

    function about()
    {
        $name = "Anuthep";
        $date = date('d-M-y');
        return view('about', compact('name', 'date'));
    }

    function create()
    {
        return view('form');
    }

    function insert(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required'
            ],
            [
                'title.required'=>'กรุณาป้อนชื่อบทความของคุณ',
                'title.max'=>'ชื่อบทความเกิน 50 ตัวอักษร',
                'content.required'=>'กรุณาเพิ่มเนื้อหาบทความของคุณ'
            ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('blogs')->insert($data);
        return redirect('/blog');
    }

    function delete($id){
        DB::table('blogs')->where('id',$id)->delete();
        return redirect('/blog');
    }

    function change($id){
        $blog = DB::table('blogs')->where('id',$id)->first();
        $data=[
            'status'=>!$blog->status
        ];
        DB::table('blogs')->where('id',$id)->update($data);
        return redirect('/blog');
    }

    function edit($id){
        $blog = DB::table('blogs')->where('id',$id)->first();
        return view('edit',compact('blog'));
    }

    function update(Request $request,$id)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required'
            ],
            [
                'title.required'=>'กรุณาป้อนชื่อบทความของคุณ',
                'title.max'=>'ชื่อบทความเกิน 50 ตัวอักษร',
                'content.required'=>'กรุณาเพิ่มเนื้อหาบทความของคุณ'
            ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('blogs')->where('id',$id)->update($data);
        return redirect('/blog');
    }
}
