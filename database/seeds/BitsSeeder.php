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
        factory(App\Bit::class, 10000)->create();
    }
}
