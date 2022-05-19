<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->input('page') ?? 1;
        $per_page = env('PER_PAGE', 10);
        return view('home', [
            'posts' => Post::orderByDesc('created_at')->take($per_page)->skip(($page - 1) * $per_page)->get(),
            'pages' => ceil(Post::count() / $per_page)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        // Create a new post record.
        $post = new Post;
        foreach ($validated as $key => $value)
        {
            $post[$key] = $value;
        }
        $post->body_html = Str::of($post->body)->markdown();
        $post->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        return view('post', [
            'post' => Post::where('url', $url)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit')->with('post', Post::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        // Update the post record.
        $post = Post::find($id);
        foreach ($validated as $key => $value)
        {
            $post[$key] = $value;
        }
        $post->body_html = Str::of($post->body)->markdown();
        $post->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/dashboard');
    }
}
