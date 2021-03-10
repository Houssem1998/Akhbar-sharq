<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'posts' => Post::all(),
            'categories' => Category::all(),
        ];
        return view('front.pages.blog')->with($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($locale,$id)
    {
        //
        $data = [
            'post' => Post::find($id),
        ];
        return view('front.pages.single-post')->with($data);
    }



}
