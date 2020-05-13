<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return array
     */
    public function index()
    {
        $blogs =  Post::all();

        return $blogs->toArray();
    }
}
