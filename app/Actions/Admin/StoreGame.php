<?php

namespace App\Actions\Admin;

use App\Game;
use App\Image;
use App\Transfers\Admin\GameStoreData;
use Illuminate\Support\Str;

class StoreGame
{
    public function handle(GameStoreData $data): Game
    {
        $rom = $data->rom
            ? $data->rom->storeAs('roms', Str::uuid()->__toString(). '.' .$data->rom->getClientOriginalExtension(), ['disk' => 'public'])
            : null;

        $game = Game::create([
            'title' => $data->title,
            'description' => $data->description,
            'platform_id' => $data->platform->id,
            'rom' => $rom,
        ]);

        foreach ($data->images as $image) {
            Image::create([
                'game_id' => $game->id,
                'path' => $image->store('images', ['disk' => 'public']),
            ]);
        }

        return $game;
    }
}