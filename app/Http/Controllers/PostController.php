<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($post)
    {
        $post = Post::find($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store()
    {
        //logic for saving in db
        $data = request()->all();
        Post::create($data);

        return redirect()->route('posts.index');
    }
    public function edit($post)
    {
        //logic for saving in db
        $post = Post::where('id',$post)->first();
        return view('posts.edit', [
            'post' => $post,'users' => User::all()
        ]);
    }
    public function update($post)
    {
        //logic for saving in db
        $postToUpdate  = Post::findOrFail($post);
        $input = request()->all();
        $postToUpdate->fill($input)->save();
        return redirect()->route('posts.index');
    }
    public function destroy($post)
    {

        //TODO: rerender right?????
        //logic for saving in db
        Post::destroy($post);
        return redirect()->route('posts.index');
    }
}
