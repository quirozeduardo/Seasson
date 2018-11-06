<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('description',250);
            $table->float('price');
            $table->float('cost');
            $table->string('image',1024);
            $table->string('info',1024)->nullable();
            $table->integer('category_id');
            $table->integer('quantity');
            $table->float('discount');
            $table->string('color',256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
