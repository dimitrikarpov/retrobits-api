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
            $query = $query->where('difficult', $filters['difficult']);
        }

        if (isset($filters['players']) && $filters['players']) {
            $query = $query->where('players', $filters['players']);
        }

        return $query;
    }
}
