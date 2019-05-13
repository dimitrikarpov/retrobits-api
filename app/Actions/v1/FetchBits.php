<?php

namespace App\Actions\v1;

use App\Bit;
use App\Http\Transfers\v1\BitIndexData;
use Illuminate\Database\Eloquent\Builder;

class FetchBits
{
    public function handle(BitIndexData $data): Builder
    {
        $query = Bit::query();

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