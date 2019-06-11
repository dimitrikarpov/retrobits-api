<?php

namespace App\Transers\Admin;

use Illuminate\Http\Request;

class UserIndexData
{
    public $sort;
    public $name_search;
    public $page_size;

    /**
     * Transform request with params to the data transfer object
     *
     *  For example, transform this:
     * /api/admin/users?filter[name]=doe&page_size=10&sort=-created_at
     *
     * In to this:
     * UserIndexData {
     *   name_search: 'doe'
     *   page_size: 10
     *   sort: -created_at }
     *
     * @param Request $request
     * @return UserIndexData
     */
    public static function fromRequest(Request $request): UserIndexData
    {
        $sort = '';
        $name_search = '';
        $page_size = 10;

        if ($filters = $request->input('filter')) {
            if (isset($filters['name']) && $filters['name']) {
                $name_search = $filters['name'];
            }
        }

        $page_size = intval($request->input('page_size', $page_size));

        $sort = $request->input('sort', $sort);

        return new self($name_search, $sort, $page_size);
    }

    /**
     * UserIndexData constructor.
     * @param string $name_search
     * @param string $sort
     * @param int $page_size
     */
    public function __construct(string $name_search, string $sort, int $page_size)
    {
        $this->name_search = $name_search;
        $this->page_size = $page_size;
        $this->sort = $sort;
    }
}