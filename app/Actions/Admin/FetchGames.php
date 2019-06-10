<?php

namespace App\Actions\Admin;

use App\Game;
use App\Transfers\Admin\GameIndexData;
use Illuminate\Database\Eloquent\Builder;

class FetchGames
{
    public function handle(GameIndexData $data): Builder
    {
        $query = Game::query();

        if ($data->platform) {
            $query = $query->whereHas('platform', function ($platformQuery) use ($data) {
                $platformQuery->whereIn('slug', $data->platform);
            });
        }

        if ($data->sort) {
            if ('title' === $data->sort) {
                $query = $query->orderBy('title');
            } else if ('-title' === $data->sort) {
                $query = $query->orderBy('title', 'DESC');
            }
        }

        return $query;
    }
}