<?php

namespace App\Http\Controllers;

use App\Adresse;
use App\Article;
use App\Comment;
use App\Recipe;
use App\RecipeRating;
use App\WebAdresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function search(Request $request) {
        $search = $request->query('search');
        $recipes = Recipe::where('title','like','%'.$search.'%')->get();
        $rcount = $recipes->count();
        $articles = Article::where('title','like','%'.$search.'%')->get();
        $acount = $articles->count();
        $adresses = Adresse::where('name','like','%'.$search.'%')->get();
        $adcount = $adresses->count();
        $wadresses = WebAdresse::where('map_link','like','%'.$search.'%')->get();
        $wcount = $wadresses->count();
        $count = $rcount + $acount + $adcount + $wcount;
        return view('search_result',compact('recipes','articles','adresses','wadresses','count','search'));
    }
    public function accueil()
    {
        $latest_articles = Article::latest()->take(3)->get();
        $most_rated = RecipeRating::select('recipe_id',DB::raw('AVG(mark) as moyenne'))
            ->groupBy('recipe_id')
            ->orderBy('moyenne','desc')
            ->take(3)
            ->pluck('recipe_id')
            ->toArray();
        $most_rated_recipes = Recipe::whereIn('id',$most_rated)->get();
        return view('homepage',compact('latest_articles','most_rated_recipes'));
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(4);
        return view('articles',compact('articles'));
    }

    public function singlearticle($article_id)
    {
        $article = Article::find($article_id);
        $articles_alike = Article::where('id','!=',$article->id)->take(3)->get();
        return view('single_article',compact('article','articles_alike'));
    }

    public function singlerecipe($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $recipes_alike = Recipe::where('id','!=',$recipe->id)->where('category',$recipe->category)->take(3)->get();
        return view('single_recipe',compact('recipe','recipes_alike'));
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

    public function likeArticle(Request $request) {
        $article = Article::find($request->get('article_id'));
        $article->likes()->attach(auth()->id());
        return redirect()->back();
    }
    public function rateRecipe(Request $request) {
        $recipe = Recipe::find($request->recipe_id);
        $rate = RecipeRating::where('user_id',auth()->id())->where('recipe_id',$recipe->id)->first();
        if ($rate) {
            $rate->mark = $request->mark;
        } else {
            $rate = new RecipeRating();
            $rate->user_id = auth()->id();
            $rate->recipe_id = $recipe->id;
            $rate->mark = $request->mark;
        }
        $rate->save();
        return redirect()->back();
    }

    public function favRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->favorites()->attach(auth()->id());
        return redirect()->back();
    }
    public function unfavRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->favorites()->detach(auth()->id());
        return redirect()->back();
    }

    public function dislikeArticle(Request $request) {
        $article = Article::find($request->get('article_id'));
        $article->likes()->detach(auth()->id());
        return redirect()->back();
    }

    public function commentArticle(Request $request) {
        $comment = new Comment();
        $comment->article_id = $request->get('article_id');
        $comment->user_id = auth()->id();
        $comment->message = $request->get('message');
        $comment->save();
        return redirect()->back();
    }
}
