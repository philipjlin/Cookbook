<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = ['entree','main','dessert','beef','chicken','pork','vegetables', 'caramel', 'pumpkin', 'cheese', 'chocolate'];

      foreach($data as $tagName) {
          $tag = new \App\Tag();
          $tag->name = $tagName;
          $tag->save();
      }
    }
}
