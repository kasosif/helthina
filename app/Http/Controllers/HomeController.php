<?php

namespace App\Http\Controllers;

use App\Adresse;
use App\Article;
use App\Recipe;
use App\WebAdresse;
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
        $articles = Article::latest()->paginate(4);
        return view('articles',compact('articles'));
    }

    public function recettes($categorie)
    {
        $recipes = Recipe::where('category',$categorie)->latest()->paginate(4);
        return view('recettes',compact('recipes'));
    }

    public function adresse()
    {
        $adresses = Adresse::latest()->paginate(4);
        return view('adresse', compact('adresses'));
    }

    public function adresseWeb()
    {
        $wadresses = WebAdresse::latest()->get();
        return view('adresseWeb',compact('wadresses'));
    }

    public function forum()
    {
        return view('forum');
    }
}
