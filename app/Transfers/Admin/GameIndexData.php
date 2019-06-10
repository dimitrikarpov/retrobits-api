<?php

namespace App\Transfers\Admin;

use Illuminate\Http\Request;

class GameIndexData
{
    public $platform;
    public $sort;

    /**
     * Transform request with params to the data transfer object
     *
     * For example, transform this:
     * /api/admin/games?filter[platform]=nes&sort=-title
     *
     * In to this:
     * GameIndexData {
     *   platform: ['nes']
     *   sort: '-title'}
     *
     * @param Request $request
     * @return GameIndexData
     */
    public static function fromRequest(Request $request): GameIndexData
    {
        $platform = [];
        $sort = '';

        if ($filters = $request->input('filter')) {
            if (isset($filters['platform']) && $filters['platform']) {
                $platform = explode(',', $filters['platform']);
            }
        }

        $sort = $request->input('sort', '');

        return new self($platform, $sort);
    }

    /**
     * GameIndexData constructor.
     * @param array $platform
     * @param string $sort
     */
    public function __construct(array $platform, string $sort)
    {
        $this->platform = $platform;
        $this->sort = $sort;
    }
}