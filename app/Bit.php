<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bit extends Model
{
    protected $guarded = [];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public static function filter($filters)
    {
        $query = self::query();

        if (isset($filters['difficult']) && $filters['difficult']) {
            $query =$query->whereIn('difficult' , explode(',', $filters['difficult']));
        }

        if (isset($filters['players']) && $filters['players']) {
            $query = $query->whereIn('players', explode(',', $filters['players']));
        }

        if (isset($filters['rating']) && $filters['rating']) {
            $query = $query->whereIn('rating', explode(',', $filters['rating']));
        }

        return $query;
    }
}
