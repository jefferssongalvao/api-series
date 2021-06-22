<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->model = new Serie();
    }

    public function episodes(int $serieId, Request $request)
    {
        $episodes = Episode::query()
            ->where("series_id", $serieId)
            ->paginate($request->per_page);

        return response()->json($episodes);
    }
}