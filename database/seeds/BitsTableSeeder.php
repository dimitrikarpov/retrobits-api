<?php

use Illuminate\Database\Seeder;

class BitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bit::class, 50)->create();
    }
}
