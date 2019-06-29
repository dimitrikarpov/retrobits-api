<?php

namespace App\Observers;

use App\Game;
use Illuminate\Support\Facades\Storage;

class GameObserver
{
    /**
     * Handle the game "created" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function created(Game $game)
    {
        //
    }

    /**
     * Handle the game "updated" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function updated(Game $game)
    {
        //
    }

    /**
     * Handle the game "deleted" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function deleted(Game $game)
    {
        Storage::disk('public')->delete($game->rom);

        $game->images->each(function($image) {
            $image->delete();
        });
    }

    /**
     * Handle the game "restored" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function restored(Game $game)
    {
        //
    }

    /**
     * Handle the game "force deleted" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function forceDeleted(Game $game)
    {
        //
    }
}
