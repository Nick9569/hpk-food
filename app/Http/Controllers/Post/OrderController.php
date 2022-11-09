<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(int $order)
    {
        if($order == 1){
            $posts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->paginate(6);
            $name = "За популярністю";
        }
        else if($order == 2){
            $posts = Post::orderBy('distance', 'ASC')->paginate(6);
            $name = "Спочатку найближчі";
        }
        else{
            $posts = Post::orderBy('title', 'ASC')->paginate(6);
            $name = "По назві";
        }
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return View('category.post.index', compact('posts', 'likedPosts', 'name'));
    }
}
