<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineStoreRequest;
use App\Http\Requests\DisciplineUpdateRequest;
use App\Services\DisciplineService as Service;

class DisciplineController extends AbstractController
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
     * @param DisciplineStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineStoreRequest $request)
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
     * @param DisciplineUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplineUpdateRequest $request, $id)
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
