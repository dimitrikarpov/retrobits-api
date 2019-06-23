<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PlatformsSeeder::class,
        ]);

        if (Storage::disk('public')->exists('export.json')) {
            // seed from json file
             $this->call(GamesSeederV2::class);
             dd('stop');
        } else {
            // seed game title and lorempixel images
            $this->call(GamesSeeder::class);
        }

         $this->call([
             BitsSeeder::class,
         ]);
    }
}
