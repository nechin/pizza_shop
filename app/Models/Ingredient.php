<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public $table = 'ingredient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the pizzas with the ingredient
     */
    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza', 'pizza_ingredients');
    }
}
