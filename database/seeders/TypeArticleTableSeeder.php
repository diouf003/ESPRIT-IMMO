<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_articles")->insert([
            ["nom" => "APPARTEMENT"],
            ["nom" => "MAISON"],
            ["nom" => "STUDIO"],
            ["nom" => "CHALET"],
            ["nom" => "MAISON SIMPLE"],
            ["nom" => "MAISON R+1"],
            ["nom" => "CHAMBRE SALLE DE BAIN"],
        ]);

        DB::table("propriete_articles")->insert([
            ["nomPropriete" => "marque", "type_article_id" => 1],
            ["nomPropriete" => "kilometre", "type_article_id" => 1],
            ["nomPropriete" => "Prix", "type_article_id" => 2],
            ["nomPropriete" => "Lieu", "type_article_id" => 2],
            ["nomPropriete" => "phone", "type_article_id" => 3],
            // ["nomPropriete" => "description", "type_article_id" => 3],
        ]);
    }
}