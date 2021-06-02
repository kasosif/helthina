<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function accueil()
   {
      return view('homepage');
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
