<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SerieRepositoryInterface
{
    public function episodes(int $serieId, int $perPage);
}