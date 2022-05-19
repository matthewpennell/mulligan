<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    
    /**
     * Show the admin dashboard with a list of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('dashboard')->with('posts', Post::all());
    }

}
