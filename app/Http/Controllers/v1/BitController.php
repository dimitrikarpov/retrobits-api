<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\FetchBits;
use App\Bit;
use App\Http\Requests\v1\BitIndexRequest;
use App\Http\Requests\v1\BitStoreRequest;
use App\Http\Resources\BitResource;
use App\Http\Transfers\v1\BitIndexData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BitIndexRequest $request
     * @param FetchBits $action
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(BitIndexRequest $request, FetchBits $action)
    {
        $data = BitIndexData::fromRequest($request);

        return BitResource::collection($action->handle($data)->paginate(10));
    }

    /**
     * @param Request $request
     * @return BitResource
     */
    public function store(BitStoreRequest $request)
    {
        $bit = Bit::create([
            'game_id' => $request->game,
            'title' => $request->title,
            'description' => $request->description,
            'players' => $request->players,
            'savefile' => $request->savefile->store('savefiles')
        ]);

        return new BitResource($bit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bit $bit
     * @return BitResource
     */
    public function show(Bit $bit)
    {
        return new BitResource($bit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Bit $bit
     * @return BitResource
     */
    public function update(Request $request, Bit $bit)
    {
        $bit->update($request->only(['title', 'description', 'players', 'difficult']));

        return new BitResource($bit);
    }

    /**
     * @param Bit $bit
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Bit $bit)
    {
        $bit->delete();

        return response()->json(null, 204);
    }
}
