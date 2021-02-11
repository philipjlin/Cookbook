<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'recipes';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'description', 'prep_time', 'cook_time', 'ingredients', 'instructions', 'tags'];

  public function user() {

    # Recipe belongs to User
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('\App\User');
  }

  public function tags()
  {
      # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
      return $this->belongsToMany('\App\Tag')->withTimestamps();
  }

}
