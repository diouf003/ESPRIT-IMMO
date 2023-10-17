<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('noSerie')->unique();
            $table->boolean('estDisponible')->default(1);
            $table->string('imageUrl')->nullable();
            $table->foreignId("types_article_id")->constrained("type_articles");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('types_article_id');
        });
        Schema::dropIfExists('articles');
    }
}
