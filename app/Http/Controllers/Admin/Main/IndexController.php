<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        $categories = Category::all();
        $arr_names = array();
        foreach ($categories as $category) {
            array_push($arr_names, $category->title);
        }
        $arr_numbers = array();
        foreach ($categories as $category) {
            array_push($arr_numbers, $category->posts()->count());
        }
        return view('admin.main.index', compact('data', 'arr_names', 'arr_numbers'));
    }
}
