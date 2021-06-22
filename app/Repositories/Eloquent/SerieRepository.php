<?php

namespace App\Repositories\Eloquent;

use App\Models\Episode;
use App\Models\Serie;
use App\Repositories\SerieRepositoryInterface;

class SerieRepository extends BaseRepository implements SerieRepositoryInterface
{
    private Episode $modelEpisode;
    public function __construct(Serie $serie)
    {
        parent::__construct($serie);
        $this->modelEpisode = new Episode();
    }

    public function episodes(int $serieId, int $perPage)
    {
        return $this->modelEpisode::query()
            ->where("series_id", $serieId)
            ->paginate($perPage);
    }
}