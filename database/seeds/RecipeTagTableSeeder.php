<?php

use Illuminate\Database\Seeder;

class RecipeTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $recipes =[
          'Chicken Red Curry' => ['entree', 'chicken', 'vegetables'],
          'Chocolate Souffle' => ['dessert', 'chocolate'],
          'Beef Stew' => ['main', 'beef', 'vegetables'],
          'Pork Roast' => ['main','pork', 'vegetables'],
          'Pumpkin Cheesecake' => ['dessert', 'pumpkin', 'cheese'],
          'Fried Chicken' => ['main', 'chicken'],
          'Spring Rolls' => ['entree', 'vegetables'],
          'Caramel Ice Cream' => ['dessert', 'caramel']
      ];

      # Now loop through the above array, creating a new pivot for each recipe to tag
      foreach($recipes as $title => $tags) {

          # First get the recipe
          $recipe = \App\Recipe::where('title', 'like', $title)->first();

          # Now loop through each tag for this recipe, adding the pivot
          foreach($tags as $tagName) {
              $tag = \App\Tag::where('name', 'LIKE', $tagName)->first();

              # Connect this tag to this recipe
              $recipe->tags()->save($tag);
          }
        }

    }

}
