<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\SerieRepository;
use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /** @var SerieRepository */
    protected EloquentRepositoryInterface $repository;
    public function __construct(SerieRepository $serieRepository)
    {
        parent::__construct($serieRepository);
    }

    public function episodes(int $serieId, Request $request)
    {
        $episodes = $this->episodes($serieId, $request->per_page);

        return response()->json($episodes);
    }
}