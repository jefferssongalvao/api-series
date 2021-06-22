<?php

namespace App\Repositories\Eloquent;

use App\Models\Episode;
use App\Repositories\EpisodeRepositoryInterface;

class EpisodeRepository extends BaseRepository implements EpisodeRepositoryInterface
{
    public function __construct(Episode $episode)
    {
        parent::__construct($episode);
    }
}