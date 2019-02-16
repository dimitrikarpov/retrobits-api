<?php

namespace App\Http\Controllers\v1;

use App\Bit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bits = Bit::all();
        return response()->json($bits, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
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
     * @return \Illuminate\Http\Response
     */
    public function show(Bit $bit)
    {
        //
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
