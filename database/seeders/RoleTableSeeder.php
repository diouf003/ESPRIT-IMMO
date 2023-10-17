<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("role")->insert([
            ["nom" => "proprietaire"],
            ["nom" => "admin"],
            // ["nom" => "manager"],
            ["nom" => "locataire"]
        ]);
    }
}
