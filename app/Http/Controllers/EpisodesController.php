<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodesController extends Controller
{
    public function __construct()
    {
        $this->model = new Episode();
    }
}