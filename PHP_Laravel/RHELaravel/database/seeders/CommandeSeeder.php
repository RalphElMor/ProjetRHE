<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Piece;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // dd($faker);
        $pieces = Piece::all()->pluck('id')->toArray();
        $users = User::all()->pluck('name')->toArray();
        //dd($users);
        for ($i = 0; $i < 10; $i++){ 
            Commande::create([
             'author'=>$faker->randomElement($users), 
             'pieces_id' => $faker->randomElement($pieces), 
 
             ]);
         }
    }
}