<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{
    public function all(): Collection;
    public function paginate(?int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Model;
    public function create(array $attributes): Model;
    public function update(int $id, array $attributes): ?Model;
    public function destroy(int $id): int;
}