<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Computer;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $models = ['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720'];
        $operatingSystems = ['Windows 10 Pro', 'Windows 11', 'Ubuntu 20.04'];
        $processors = ['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600X'];

        for ($i = 1; $i <= 50;$i++) {
            Computer::create([
                'computer_name' => 'Lab' . $faker->numberBetween(1, 5) . '-PC' . $faker->numberBetween(1, 50),
                'model' => $faker->randomElement($models),
                'operating_system' => $faker->randomElement($operatingSystems),
                'processor' => $faker->randomElement($processors),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(80), // 80% có sẵn
            ]);
        }
    }
}
