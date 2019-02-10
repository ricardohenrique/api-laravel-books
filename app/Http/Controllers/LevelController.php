<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelStoreRequest;
use App\Http\Requests\LevelUpdateRequest;
use App\Services\LevelService as Service;

class LevelController extends AbstractController
{
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LevelStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevelStoreRequest $request)
    {
        return response()->json($this->service->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LevelUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LevelUpdateRequest $request, $id)
    {
        return response()->json($this->service->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->service->delete($id));
    }
}
