<?php

use Illuminate\Database\Seeder;

class BitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Game::class, 100)->create();
        factory(App\Bit::class, 1000)->create();
    }
}
