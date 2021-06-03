<?php

namespace App\Http\Controllers;

use App\Adresse;
use App\Article;
use App\Recipe;
use App\WebAdresse;
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
        Article::create($request->except('image', 'second_image'));
        return redirect()->route('dash.gestionArticle');
    }

    public function deleteArticle(Request $request, $article_id)
    {
        $articleToDelete = Article::find($article_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionArticle');
    }

    public function gestionRecipe()
    {
        $recipes = Recipe::all();
        return view('dash.gestionRecipe', compact('recipes'));
    }

    public function ajouterRecipe(Request $request)
    {
        Recipe::create($request->except('image'));
        return redirect()->route('dash.gestionRecipe');
    }

    public function deleteRecipe(Request $request, $recipe_id)
    {
        $articleToDelete = Recipe::find($recipe_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionRecipe');
    }

    public function gestionAdresse()
    {
        $adresses = Adresse::all();
        return view('dash.gestionAdresse', compact('adresses'));
    }

    public function ajouterAdresse(Request $request)
    {
        Adresse::create($request->except('image'));
        return redirect()->route('dash.gestionAdresse');
    }

    public function deleteAdresse(Request $request, $recipe_id)
    {
        $articleToDelete = Adresse::find($recipe_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionAdresse');
    }

    public function gestionWebAdresse()
    {
        $webAdresses = WebAdresse::all();
        return view('dash.gestionWebAdresse', compact('webAdresses'));
    }

    public function ajouterWebAdresse(Request $request)
    {
        WebAdresse::create($request->except('image'));
        return redirect()->route('dash.gestionWebAdresse');
    }

    public function deleteWebAdresse(Request $request, $web_address_id)
    {
        $articleToDelete = WebAdresse::find($web_address_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionWebAdresse');
    }
}
