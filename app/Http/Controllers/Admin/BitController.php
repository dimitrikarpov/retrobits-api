<?php

namespace App\Http\Controllers\Admin;

use App\Bit;
use App\Actions\Admin\FetchBits;
use App\Transfers\Admin\BitIndexData;
use App\Http\Requests\Admin\BitIndexRequest;
use App\Http\Resources\Admin\BitResource;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bit  $bit
     * @return BitResource|\Illuminate\Http\Response
     */
    public function show(Bit $bit)
    {
        return new BitResource($bit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bit  $bit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bit $bit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bit  $bit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bit $bit)
    {
        //
    }
}
