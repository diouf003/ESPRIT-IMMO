<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Client;
use App\Models\Locataire;
use App\Models\Payment;
use App\Models\Reponse;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TypeArticleTableSeeder::class);

        Article::factory(10)->create();

        Client::factory(10)->create();
        User::factory(10)->create();
        Locataire::factory(2)->create();
        Reponse::factory(5)->create();
        Payment::factory(3)->create();


        $this->call(StatutLocationTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeLocationTableSeeder::class);

        user::find(1)->Roles()->attach(1);
        user::find(2)->Roles()->attach(2);
        user::find(3)->Roles()->attach(3);
        // user::find(4)->Roles()->attach(4);
    }
}
