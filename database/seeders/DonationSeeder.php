<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $arrayValues = ['Bencana Alam', 'Yatim Piatu', 'Kaum Dhuafa', 'Disabilitas'];
        $title = $faker->sentence;
        for ($i = 0; $i < 50; $i++) {
            Donation::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => 'default.jpg',
                'category' => $arrayValues[rand(0,3)],
                'total_budget' => rand(1, 99990),
                'description' => $faker->paragraph,
            ]);
        }
    }
}
