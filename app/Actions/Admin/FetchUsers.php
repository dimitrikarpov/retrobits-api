<?php

namespace App\Actions\Admin;

use App\User;
use App\Transers\Admin\UserIndexData;
use Illuminate\Database\Eloquent\Builder;

class FetchUsers
{
    public function handle(UserIndexData $data): Builder
    {
        $query = User::query();

        if ($data->sort) {
            switch($data->sort) {
                case 'name':
                    $query = $query->orderBy('name');
                    break;
                case '-name':
                    $query = $query->orderBy('name', 'DESC');
                    break;
                case 'created_at':
                    $query = $query->orderBy('created_at');
                    break;
                case '-created_at':
                    $query = $query->orderBy('created_at', 'DESC');
                    break;
            }
        }

        if ($data->name_search) {
            $query = $query->where('name', 'like', "%{$data->name_search}%");
        }
        return $query;
    }
}