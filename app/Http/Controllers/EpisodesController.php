<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\EpisodeRepository;
use App\Repositories\EloquentRepositoryInterface;

class EpisodesController extends Controller
{
    /** @var EpisodeRepository */
    protected EloquentRepositoryInterface $repository;
    public function __construct(EpisodeRepository $episodeRepository)
    {
        parent::__construct($episodeRepository);
    }
}