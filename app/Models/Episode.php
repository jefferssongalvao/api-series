<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;

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

    public function getLinksAttribute(): array
    {
        return [
            "self" => "/api/episodes/" . $this->id,
            "serie" => "/api/series/" . $this->series_id
        ];
    }
}