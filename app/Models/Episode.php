<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;
    protected $fillable = ["season", "number", "was_watched", "series_id"];
    protected $appends = ["links"];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getWasWatchedAttribute($wasWatched): bool
    {
        return $wasWatched;
    }

    public function getLinksAttribute($links): array
    {
        return [
            "self" => "/api/episodes/" . $this->id,
            "serie" => "/api/series/" . $this->series_id
        ];
    }
}