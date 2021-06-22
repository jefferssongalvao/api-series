<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $appends = ["links"];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            "self" => "/api/series/" . $this->id,
            "episodes" => "/api/series/" . $this->series_id . "episodes"
        ];
    }
}