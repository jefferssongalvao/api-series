<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamp = false;
    protected $fillable = ["season", "number", "was_watched"];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}