<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('recipe_tag', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        # `recipe_id` and `tag_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `recipe_id` will reference the `recipe table` and `tag_id` will reference the `tags` table.
        $table->integer('recipe_id')->unsigned();
        $table->integer('tag_id')->unsigned();

        # Make foreign keys
        $table->foreign('recipe_id')->references('id')->on('recipes');
        $table->foreign('tag_id')->references('id')->on('tags');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_tag');
    }
}
