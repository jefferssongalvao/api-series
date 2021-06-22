<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->model = new Serie();
    }
}