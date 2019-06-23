<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    protected $with = ['platform', 'images'];

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function bits()
    {
        return $this->hasMany(Bit::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
