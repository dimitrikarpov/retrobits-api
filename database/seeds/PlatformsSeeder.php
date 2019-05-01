<?php

use Illuminate\Database\Seeder;

class PlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Platform::class)->create([
            'title' => 'ZX-Spectrum',
            'slug' => 'zx-spectrum'
        ]);

        factory(App\Platform::class)->create([
            'title' => 'Nintendo',
            'slug' => 'nes'
        ]);

        factory(App\Platform::class)->create([
            'title' => 'Sega Mega Drive',
            'slug' => 'sega'
        ]);

        factory(App\Platform::class)->create([
            'title' => 'Super Nintendo',
            'slug' => 'snes'
        ]);
    }
}
