<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Basic Level'
        ]);

        Level::create([
            'name' => 'Intermediate Level'
        ]);

        Level::create([
            'name' => 'Advanced Level'
        ]);
    }
}
