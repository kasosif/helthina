<?php

namespace App\Http\Controllers;

use App\Article;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function accueil()
    {
        $latest_articles = Article::latest()->take(3);
        $most_rated_recipes = Recipe::select('recipes.id','recipes.title','recipes.image','recipes.description','recipe_ratings.mark',DB::raw('COUNT(*)'))
            ->leftJoin('recipe_ratings','recipes.id','recipe_ratings.recipe_id')
            ->groupBy('recipe_ratings.mark','recipes.id')
            ->take(3)
            ->get();
        return view('homepage',compact('latest_articles','most_rated_recipes'));
    }

    public function articles()
    {
        return view('articles');
    }

    public function recettes($categorie)
    {
        return view('recettes');
    }

    public function adresse()
    {
        return view('adresse');
    }

    public function adresseWeb()
    {
        return view('adresseWeb');
    }

    public function forum()
    {
        return view('forum');
    }
}
