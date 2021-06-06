<?php

namespace App\Http\Controllers;

use App\Adresse;
use App\Article;
use App\Comment;
use App\Recipe;
use App\Step;
use App\WebAdresse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashController extends Controller
{
    public function accueil()
    {
        $nb_articles = Article::count();
        $nb_recettes = Recipe::count();
        $nb_addresses = Adresse::count();
        $nb_wadresses = WebAdresse::count();
        return view('dash.home',compact('nb_articles','nb_recettes','nb_addresses','nb_wadresses'));
    }

    public function likedArticles() {
        $user = auth()->user();
        $articles = $user->likes;
        return view('dash.article', compact('articles'));
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
        $article = Article::create($request->except('image', 'second_image'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(storage_path('app/public/uploads/article_images'),$name);
            $article->image = $name;
        }
        if ($image2 = $request->file('second_image')) {
            $name = Str::random(8).'.'.$image2->getClientOriginalExtension();
            $image2->move(storage_path('app/public/uploads/article_images'),$name);
            $article->second_image = $name;
        }
        $article->save();
        return redirect()->route('dash.gestionArticle')->with('success','Article ajouté avec succées');
    }

    public function modifArticle($id) {
        $article = Article::find($id);
        return view('dash.modif_article',compact('article'));
    }

    public function updateArticle(Request $request,int $id)
    {
        $article = Article::find($id);
        $article->update($request->except('image', 'second_image'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(storage_path('app/public/uploads/article_images'),$name);
            $article->image = $name;
        }
        if ($image2 = $request->file('second_image')) {
            $name = Str::random(8).'.'.$image2->getClientOriginalExtension();
            $image2->move(storage_path('app/public/uploads/article_images'),$name);
            $article->second_image = $name;
        }
        $article->save();
        return redirect()->route('dash.gestionArticle')->with('success','Article modifié avec succées');
    }

    public function deleteArticle(Request $request, $article_id)
    {
        $articleToDelete = Article::find($article_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionArticle')->with('success','Article supprimé avec succées');
    }

    public function gestionRecipe()
    {
        $recipes = Recipe::all();
        return view('dash.gestionRecipe', compact('recipes'));
    }

    public function ajouterRecipe(Request $request)
    {
        $recette = Recipe::create($request->except('image','etapes'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(storage_path('app/public/uploads/recipe_images'),$name);
            $recette->image = $name;
        }
        $recette->save();
        foreach ($request->get('etapes') as $textetape) {
            Step::create([
                'body' => $textetape,
                'recipe_id' => $recette->id
            ]);
        }
        return redirect()->route('dash.gestionRecipe')->with('success','Recette ajoutée avec succées');;
    }

    public function modifRecipe($id) {
        $recipe = Recipe::find($id);
        return view('dash.modif_recipe',compact('recipe'));
    }

    public function updateRecipe(Request $request,$id)
    {
        $recette = Recipe::find($id);
        $recette->update($request->except('image','etapes'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(storage_path('app/public/uploads/recipe_images'),$name);
            $recette->image = $name;
        }
        $recette->save();
        if ($request->etapes) {
            Step::where('recipe_id',$recette->id)->delete();
            foreach ($request->get('etapes') as $textetape) {
                Step::create([
                    'body' => $textetape,
                    'recipe_id' => $recette->id
                ]);
            }
        }
        return redirect()->route('dash.gestionRecipe')->with('success','Recette Modifiée avec succées');;
    }

    public function deleteRecipe(Request $request, $recipe_id)
    {
        $articleToDelete = Recipe::find($recipe_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionRecipe')->with('success','Recette supprimée avec succées');
    }

    public function gestionAdresse()
    {
        $adresses = Adresse::all();
        return view('dash.gestionAdresse', compact('adresses'));
    }

    public function ajouterAdresse(Request $request)
    {
        $adresse = Adresse::create($request->except('image'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('uploads/adresse_images'),$name);
            $adresse->image = $name;
        }
        $adresse->save();
        return redirect()->route('dash.gestionAdresse')->with('success','Adresse ajoutée avec succées');
    }

    public function deleteAdresse(Request $request, $recipe_id)
    {
        $articleToDelete = Adresse::find($recipe_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionAdresse')->with('success','Adresse supprimée avec succées');
    }

    public function gestionWebAdresse()
    {
        $webAdresses = WebAdresse::all();
        return view('dash.gestionWebAdresse', compact('webAdresses'));
    }

    public function ajouterWebAdresse(Request $request)
    {
        $wadresse = WebAdresse::create($request->except('image'));
        if ($image1 = $request->file('image')) {
            $name = Str::random(8).'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('uploads/web_adresse_images'),$name);
            $wadresse->image = $name;
        }
        $wadresse->save();
        return redirect()->route('dash.gestionWebAdresse')->with('success','Adresse Web ajoutée avec succées');
    }

    public function deleteWebAdresse(Request $request, $web_address_id)
    {
        $articleToDelete = WebAdresse::find($web_address_id);
        $articleToDelete->delete();
        return redirect()->route('dash.gestionWebAdresse')->with('success','Adresse Web supprimée avec succées');
    }

    public function deleteComment($id) {
        $comment = Comment::find($id);
        if (auth()->user()->id == $comment->user_id) {
            $comment->delete();
        }else {
            abort(401);
        }
        return redirect()->back()->with('success','Commentaire supprimée avec succées');
    }
}
