<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];
    public function favorites() {
        return $this->belongsToMany(User::class);
    }

    public function ratings() {
        return $this->hasMany(RecipeRating::class);
    }

    public function steps() {
        return $this->hasMany(Step::class);
    }
}
