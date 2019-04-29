<?php

namespace App\Http\Controllers\v1;

use App\Game;
use App\Http\Resources\GameResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GameResource::collection(Game::filter(request()->input('filter'))->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return GameResource
     */
    public function store(Request $request)
    {
        $game = Game::create([
            'platform_id' => $request->platform_id,
            'title' => $request->title,
            'description' => $request->description,
            'rom' => $request->rom,
            'image' => $request->image,
        ]);

        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return GameResource
     */
    public function show(Game $game)
    {
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return GameResource
     */
    public function update(Request $request, Game $game)
    {
        $game->update($request->only(['title', 'description', 'rom', 'image']));

        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json(null, 204);
    }
}
