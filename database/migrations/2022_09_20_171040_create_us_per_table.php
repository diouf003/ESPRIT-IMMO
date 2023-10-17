<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsPerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('us_per', function (Blueprint $table) {
            $table->foreignId("user_id");
            $table->foreignId("permission_id");

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
        Schema::table("us_per", function (Blueprint $table) {
            $table->dropForeign("user_id")->constrained();
            $table->dropForeign("permission_id")->constrained();
        });
        Schema::dropIfExists('us_per');
    }
}