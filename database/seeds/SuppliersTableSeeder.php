<?php

use App\Product;
use App\Supplier;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Supplier::truncate();
        $faker = \Faker\Factory::create();

        $users = App\User::all();

        foreach ($users as $user) {

            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunos articulos

            for ($j = 0; $j < 3; $j++) {
                $supplier = Supplier::create([
                'name' => $faker->firstName,
            ]);
                $supplier->products()->saveMany(
                    $faker->randomElements(
                        array(
                            Product::find(1),
                            Product::find(2),
                            Product::find(3)
                        ), $faker->numberBetween(1, 3), false
                    )
                );
        }
    }
    }

}
