<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\FetchUsers;
use App\Http\Requests\Admin\UserIndexRequest;
use App\Http\Resources\Admin\UserResource;
use App\Transers\Admin\UserIndexData;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserIndexRequest $request
     * @param FetchUsers $action
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(UserIndexRequest $request, FetchUsers $action)
    {
        $data = UserIndexData::fromRequest($request);

        return UserResource::collection($action->handle($data)->paginate($data->page_size));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
