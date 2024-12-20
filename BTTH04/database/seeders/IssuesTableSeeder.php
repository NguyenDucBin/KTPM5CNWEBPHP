<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Computer;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $urgencies = ['Low', 'Medium', 'High'];
        $statuses = ['Open', 'In Progress', 'Resolved'];

        $computers = Computer::all();

        for ($i = 1; $i <= 50; $i++) {
            Issue::create([
                'computer_id' => $computers->random()->id,
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->paragraph,
                'urgency' => $faker->randomElement($urgencies),
                'status' => $faker->randomElement($statuses),
            ]);
        }
    }
}
