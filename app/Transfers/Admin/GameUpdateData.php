<?php

namespace App\Transfers\Admin;

use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class GameUpdateData
{
    public $platform;
    public $title;
    public $description;
    public $rom;
    public $images;

    public static function fromRequest(Request $request): GameUpdateData
    {
        return new self(
            Platform::whereSlug($request->input('platform'))->first(),
            $request->input('title'),
            $request->input('description'),
            $request->rom,
            $request->images ?? []
        );
    }

    public function __construct(Platform $platform, string $title, string $description, ?UploadedFile $rom, ?array $images)
    {
        $this->platform = $platform;
        $this->title = $title;
        $this->description = $description;
        $this->rom = $rom;
        $this->images = $images;
    }
}
