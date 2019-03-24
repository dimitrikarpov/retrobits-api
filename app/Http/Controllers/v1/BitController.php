<?php

namespace App\Http\Controllers\v1;

use App\Bit;
use App\Http\Resources\BitResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BitResource::collection(Bit::filter(request()->input('filter'))->paginate(10));
    }

    /**
     * @param Request $request
     * @return BitResource
     */
    public function store(Request $request)
    {
        $bit = Bit::create([
            'game_id' => $request->game_id,
            'title' => $request->title,
            'description' => $request->description,
            'players' => $request->players,
            'difficult' => $request->difficult,
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
