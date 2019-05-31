<?php

namespace App\Actions\v1;

use App\Bit;
use App\Transfers\v1\BitIndexData;
use Illuminate\Database\Eloquent\Builder;

class FetchBits
{
    public function handle(BitIndexData $data): Builder
    {
        $query = Bit::query();

        if ($data->platform) {
            $query = $query->whereHas('game.platform', function ($platformQuery) use ($data) {
                $platformQuery->whereIn('slug', $data->platform);
            });
        }

        if ($data->difficult) {
            $query = $query->whereIn('difficult', $data->difficult);
        }

        if ($data->players) {
            $query = $query->whereIn('players', $data->players);
        }

        if ($data->rating) {
            $query = $query->whereIn('rating', $data->rating);
        }

        if ($data->sort) {
            // sorting logic
        }

        return $query;
    }
}