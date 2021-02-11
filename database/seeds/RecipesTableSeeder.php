<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_id1 = \App\User::where('user_name','=','john')->pluck('id');
      $user_id2 = \App\User::where('user_name','=','jane')->pluck('id');
      $user_id3 = \App\User::where('user_name','=','jill')->pluck('id');
      $user_id4 = \App\User::where('user_name','=','jamal')->pluck('id');


      DB::table('recipes')->insert([
        'user_id' => $user_id1,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Chicken Red Curry',
        'description' => 'Thai Style Chicken Curry',
        'prep_time' => 30,
        'cook_time' => 60,
        'ingredients' => '1. Spice
                        2. Salt and Pepper',
        'instructions' => '1. Prep the curry.
                        2. Cook the curry.',
        'tags' => '#main #thai #chicken #curry #yum',
      ]);


      DB::table('recipes')->insert([
        'user_id' => $user_id2,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Chocolate Souffle',
        'description' => 'Sweet Chocolate Souffle',
        'prep_time' => 45,
        'cook_time' => 15,
        'instructions' => '1. Prep the souffle.
                        2. Cook the souffle.',
        'ingredients' => '1. Love
                        2. Chocolate',
        'tags' => '#dessert #chocolate',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id3,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Beef Stew',
        'description' => 'Slow Cooker Beef Stew',
        'prep_time' => 30,
        'cook_time' => 90,
        'instructions' => '1. Prep ingredients.
                        2. Put ingredients into slow cooker.
                        3. Wait.',
        'ingredients' => '1. Beef
                        2. Vegetables
                        3. Stock',
        'tags' => '#main #beef #vegetables',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id4,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Pork Roast',
        'description' => 'Roasted Pork Belly with Crackling',
        'prep_time' => 40,
        'cook_time' => 50,
        'instructions' => '1. Score pork.
                        2. Salt pork.
                        3. Roast.',
        'ingredients' => '1. Pork
                        2. Salt',
        'tags' => '#main #pork',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id1,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Pumpkin Cheesecake',
        'description' => 'Pumpkin Spice Flavored Cheesecake',
        'prep_time' => 20,
        'cook_time' => 60,
        'instructions' => '1. Mix all ingredients well.
                        2. Bake in oven.
                        3. Roast.',
        'ingredients' => '1. Cream cheese
                        2. Sugar
                        3. Patience',
        'tags' => '#dessert #cheese #pumpkin',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id2,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Fried Chicken',
        'description' => 'Southern Style Spicy Fried Chicken',
        'prep_time' => 20,
        'cook_time' => 20,
        'instructions' => '1. Make batter.
                        2. Coat chicken with batter.
                        3. Fry it up.',
        'ingredients' => '1. Chicken
                        2. Batter
                        3. Appetite',
        'tags' => '#main #chicken',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id3,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Spring Rolls',
        'description' => 'Healthy Spring Rolls',
        'prep_time' => 15,
        'cook_time' => 15,
        'instructions' => '1. Chop vegetables.
                        2. Roll.',
        'ingredients' => '1. Vegetables
                        2. Rolls',
        'tags' => '#entree #vegetables',
      ]);

      DB::table('recipes')->insert([
        'user_id' => $user_id4,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Caramel Ice Cream',
        'description' => 'The Best Ice Cream Ever Made',
        'prep_time' => 20,
        'cook_time' => 60,
        'instructions' => '1. Make the base.
                        2. Put it in the ice cream machine.',
        'ingredients' => '1. Milk
                        2. Eggs
                        3. Sugar',
        'tags' => '#dessert #caramel',
      ]);

    }
}
