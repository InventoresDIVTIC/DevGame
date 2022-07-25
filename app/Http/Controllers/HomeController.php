<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(){
        $ids = auth()->user()->following->pluck('id')->toArray();
        $postsFollow = Post::whereIn('user_id', $ids)->latest()->paginate(20); //Obtiene las publicaciones de los usuarios que sigues
        $postsLast = Post::latest()->take(10)->get();

        $posts = $postsFollow->merge($postsLast);
        return view('home', [
            'posts' => $posts 
        ]);
    }
}
