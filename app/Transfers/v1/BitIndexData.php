<?php

namespace App\Transfers\v1;

use Illuminate\Http\Request;

class BitIndexData
{
    public $difficult;
    public $players;
    public $rating;
    public $sort;

    /**
     * Transform request with params to the data transfer object
     *
     * For example, transform this:
     * /api/bits?filter[difficult]=normal,hard&filter[players]=1,2&sort=recent
     *
     * In to this:
     * BitIndexData {
     *   difficult: [ "normal", "hard"]
     *   players: ["1", "2"]
     *   rating: []
     *   sort: "recent" }
     *
     * @param Request $request
     * @return BitIndexData
     */
    public static function fromRequest(Request $request): BitIndexData
    {
        $difficult = [];
        $players = [];
        $rating = [];
        $sort = '';

        if ($filters = $request->input('filter')) {
            if (isset($filters['difficult']) && $filters['difficult']) {
                $difficult = explode(',', $filters['difficult']);
            }

            if (isset($filters['players']) && $filters['players']) {
                $players = explode(',', $filters['players']);
            }

            if (isset($filters['rating']) && $filters['rating']) {
                $rating = explode(',', $filters['rating']);
            }
        }

        $sort = $request->input('sort') ?? '';

        return new self($difficult, $players, $rating, $sort);
    }

    /**
     * BitIndexData constructor.
     * @param array $difficult
     * @param array $players
     * @param array $rating
     * @param string $sort
     */
    public function __construct(
        array $difficult,
        array $players,
        array $rating,
        string $sort
    ) {
        $this->difficult = $difficult;
        $this->players = $players;
        $this->rating = $rating;
        $this->sort = $sort;
    }
}