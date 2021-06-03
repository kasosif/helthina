<?php

namespace App\Http\Controllers;

class DashController extends Controller
{
    public function accueil()
    {
        $user = auth()->user();
        $likedArticles = $user->likes;
        return view('dash.home',compact('likedArticles'));
    }

    public function savedRecipe()
    {
        $user = auth()->user();
        $favorits = $user->favorites;
        return view('dash.recipe',compact('favorits'));
    }

    public function comment()
    {
        $user = auth()->user();
        $comments = $user->comments;
        return view('dash.comment',compact('comments'));
    }
}
