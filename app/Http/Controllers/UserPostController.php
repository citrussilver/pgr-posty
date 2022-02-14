<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function index(User $user) {
        //grab the currently authenticated user
        //show a list of their posts
        //as well as their info as well
        //dd($user);

        $posts = $user->posts()->with(['user', 'likes'])->paginate(2);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
