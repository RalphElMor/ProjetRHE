<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Piece;
use App\Models\User;
use Illuminate\Database\Seeder;

class PieceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Factory::create();
       $users = User::all()->pluck('id')->toArray();
       for ($i = 0; $i < 10; $i++){ 
        Piece::create([
            'partName'  => $faker->word(),
            'supplier'  => $faker->text(600),
            'price'     => $faker->randomFloat(2, 10, 1000),
            'carModel'  => $faker->word(),
            'user_id'   => $faker->randomElement($users),
       

            ]);
        }
    }
}
