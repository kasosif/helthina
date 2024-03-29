<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeRating extends Model
{
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
