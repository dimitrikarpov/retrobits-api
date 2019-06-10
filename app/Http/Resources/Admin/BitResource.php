<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class BitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'players' => $this->players,
            'difficult' => $this->difficult,
            'rating' => $this->rating,
            'savefile' => $this->savefile,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'game' => new GameResource($this->game),
        ];
    }
}
