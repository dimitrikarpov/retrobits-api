<?php

namespace App\Actions\App;

use App\Bit;
use App\Transfers\App\BitIndexData;
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
        if ($data->platform) {
            $query = $query->whereHas('game', function ($gameQuery) use ($data) {
                $gameQuery->whereHas('platform', function ($platformQuery) use ($data) {
                    $platformQuery->whereIn('slug', $data->platform);
                });
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
            if ('latest' === $data->sort) {
                $query->orderBy('created_at', 'DESC')->orderBy('title');
            } else if ('rating' === $data->sort) {
                $query->orderBy('rating', 'DESC')->orderBy('title');
            }
        }

        return $query;
    }
}