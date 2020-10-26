<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_film', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('film_id')->unsigned(); 
            $table->foreign('film_id')->references('id')->on('Films')
            ->onDelete('cascade')
            ->onUpdate('cascade');  
            $table->biginteger('category_id')->unsigned(); 
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
