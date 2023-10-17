<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprieteArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propriete_articles', function (Blueprint $table) {
            $table->id();
            $table->string('nomPropriete');
            $table->boolean('estObligatoire')->default(1);
            $table->foreignId("type_article_id")->constrained();

            $table->unique(["nomPropriete", "type_article_id"]);
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
        Schema::create('propriete_articles', function (Blueprint $table) {
            $table->dropForeign("type_article_id");
        });
        Schema::dropIfExists('propriete_articles');
    }
}
