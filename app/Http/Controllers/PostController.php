<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'Laravel', 'description' => 'This Is description', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-13'],
            ['id' => 2, 'title' => 'JS', 'description' => 'This Is description', 'posted_by' => 'Mohamed', 'created_at' => '2021-03-25'],
        ];

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
}
