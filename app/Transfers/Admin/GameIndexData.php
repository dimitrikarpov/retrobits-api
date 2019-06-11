<?php

namespace App\Transfers\Admin;

use Illuminate\Http\Request;

class GameIndexData
{
    public $platform;
    public $sort;
    public $page_size;
    public $title_search;

    /**
     * Transform request with params to the data transfer object
     *
     * For example, transform this:
     * /api/admin/games?filter[platform]=nes&sort=-title&page_size=10&filter[title]=castlevania
     *
     * In to this:
     * GameIndexData {
     *   platform: ['nes']
     *   sort: '-title'
     *   page_size: 10
     *   title_search: 'castlevania' }
     *
     * @param Request $request
     * @return GameIndexData
     */
    public static function fromRequest(Request $request): GameIndexData
    {
        $platform = [];
        $sort = '';
        $page_size = 0;
        $title_search = '';

        if ($filters = $request->input('filter')) {
            if (isset($filters['platform']) && $filters['platform']) {
                $platform = explode(',', $filters['platform']);
            }

            if (isset($filters['title']) && $filters['title']) {
                $title_search = $filters['title'];
            }
        }

        $page_size = intval($request->input('page_size', 10));

        $sort = $request->input('sort', '');

        return new self($platform, $sort, $page_size, $title_search);
    }

    /**
     * GameIndexData constructor.
     * @param array $platform
     * @param string $sort
     * @param int $page_size
     * @param string $title_search
     */
    public function __construct(array $platform, string $sort, int $page_size, string $title_search)
    {
        $this->platform = $platform;
        $this->sort = $sort;
        $this->page_size = $page_size;
        $this->title_search = $title_search;
    }
}