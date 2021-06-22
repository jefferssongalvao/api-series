<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected EloquentRepositoryInterface $repository;
    public function __construct(EloquentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json(
            $this->repository->create($request->all()),
            201
        );
    }

    public function show(int $id)
    {
        $modelInstance = $this->repository->find($id);
        return response()->json(
            $modelInstance,
            is_null($modelInstance) ? 204 : 200
        );
    }

    public function update(int $id, Request $request)
    {
        $modelInstance = $this->repository->update($id, $request->all());

        if (is_null($modelInstance)) {
            return response()->json(["error" => "Entity not found"], 404);
        }

        return response()->json($modelInstance);
    }

    public function destroy(int $id)
    {
        $destroyResult = $this->repository->destroy($id);

        if ($destroyResult === 0) {
            return response()->json(["error" => "Entity not found"], 404);
        }

        return response()->json("", 204);
    }
}