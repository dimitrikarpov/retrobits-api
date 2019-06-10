<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\FetchGames;
use App\Game;
use App\Http\Requests\Admin\GameIndexRequest;
use App\Http\Resources\Admin\GameResource;
use App\Transfers\Admin\GameIndexData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    /**
     * @param GameIndexRequest $request
     * @param FetchGames $action
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GameIndexRequest $request, FetchGames $action)
    {
        $data = GameIndexData::fromRequest($request);

        return GameResource::collection($action->handle($data)->paginate(10));
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
