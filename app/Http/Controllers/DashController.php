<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function accueil()
    {
        $user = auth()->user();
        $likedArticles = $user->likes;
        return view('dash.home', compact('likedArticles'));
    }

    public function savedRecipe()
    {
        $user = auth()->user();
        $favorits = $user->favorites;
        return view('dash.recipe', compact('favorits'));
    }

    public function comment()
    {
        $user = auth()->user();
        $comments = $user->comments;
        return view('dash.comment', compact('comments'));
    }

    public function gestionArticle()
    {
        $articles = Article::all();
        return view('dash.gestionArticle', compact('articles'));
    }

    public function ajouterArticle(Request $request)
    {
        Article::create($request->except('image','second_image'));
        return redirect()->route('dash.gestionArticle');
    }

    public function deleteArticle(Request $request, $article_id)
    {
        $articleToDelete = Article::find($article_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionArticle');
    }
}
