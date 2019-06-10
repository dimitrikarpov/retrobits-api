<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\PlatformResource;
use App\Platform;
use App\Http\Controllers\Controller;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PlatformResource::collection(Platform::all());
    }
}
