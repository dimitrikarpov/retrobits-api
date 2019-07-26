<?php

namespace App\Actions\Admin;

use App\Game;
use App\Image;
use App\Transfers\Admin\GameUpdateData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateGame
{
    public function handle(GameUpdateData $data, Game $game): Game
    {
        $rom = $data->rom
            ? $this->storeRom($data, $game)
            : null;

        $game->update([
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

    /**
     * @param GameUpdateData $data
     * @param Game $game
     * @return string stored filepath
     */
    private function storeRom(GameUpdateData $data, Game $game): string
    {
        if ($game->rom) {
            Storage::disk('public')->delete($game->rom);
        }

        return $data->rom->storeAs('roms', Str::uuid()->__toString() . '.' . $data->rom->getClientOriginalExtension(), ['disk' => 'public']);
    }
}
