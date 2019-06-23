<?php

use App\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GamesSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = json_decode(Storage::disk('public')->get('export.json'), true);
        $this->seed('zx', $games);
        $this->seed('nes', $games);
        $this->seed('snes', $games);
        $this->seed('smd', $games);
    }

    private function seed(string $platformSlug, array $games)
    {
        $platform = Platform::whereSlug($platformSlug)->first();

        foreach ($games[$platformSlug] as $gameInfo) {
            $game = factory(App\Game::class)->create([
                'platform_id' => $platform->id,
                'title' => $gameInfo['title'],
            ]);

            $images = [];
            foreach ($gameInfo['images'] as $url) {
                $image = factory(App\Image::class)->create([
                    'game_id' => $game->id,
                    'url' => $url,
                ]);
                $images[] = $image;
            }

            $game->images()->saveMany($images);
        }
    }
}
