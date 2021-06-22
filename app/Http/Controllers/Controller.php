<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected Model $model;

    public function index()
    {
        return $this->model::all();
    }

    public function store(Request $request)
    {
        return response()->json(
            $this->model::create($request->all()),
            201
        );
    }

    public function show(int $id)
    {
        $modelInstance = $this->model::find($id);
        return response()->json(
            $modelInstance,
            is_null($modelInstance) ? 204 : 200
        );
    }

    public function update(int $id, Request $request)
    {
        $modelInstance = $this->model::find($id);
        if (is_null($modelInstance)) {
            return response()->json(["error" => "Entity not found"], 404);
        }

        $modelInstance->fill($request->all());
        $modelInstance->save();

        return response()->json($modelInstance);
    }

    public function destroy(int $id)
    {
        $destroyResult = $this->model::destroy($id);
        if ($destroyResult === 0) {
            return response()->json(["error" => "Entity not found"], 404);
        }
        return response()->json("", 204);
    }
}