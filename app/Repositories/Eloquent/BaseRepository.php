<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate(?int $perPage): LengthAwarePaginator
    {
        return $this->model::paginate($perPage);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes): ?Model
    {
        try {
            $modelInstance = $this->model::find($id);
            if (is_null($modelInstance)) throw new Exception();

            $modelInstance->fill($attributes);
            $modelInstance->save();

            return $this->model;
        } catch (Exception $e) {
            return null;
        }
    }

    public function destroy(int $id): int
    {
        return $this->model->destroy($id);
    }
}