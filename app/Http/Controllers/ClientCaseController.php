<?php

namespace App\Http\Controllers;

use App\Models\ClientCase;
use App\Http\Controllers\BaseApiController as BaseApiController;

use App\Http\Requests\StoreClientCaseRequest;
use App\Http\Requests\UpdateClientCaseRequest;

class ClientCaseController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientCaseRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreClientCaseRequest $request): JsonResponse
    {
        $newCase                 = new ClientCase;
        $newCase->reporter_email = $request->reporterEmail;
        $newCase->reporter_name  = $request->reporterName;
        $newCase->reporter_age   = $request->reporterAge;
        $newCase->reporter_url   = $request->reporterUrl;

        if (!$newCase->save()) {
            return $this->returnsError('Creation failed.');
        }

        return $this->returnsSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientCase  $clientCase
     * @return \Illuminate\Http\Response
     */
    public function show(ClientCase $clientCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientCase  $clientCase
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientCase $clientCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientCaseRequest  $request
     * @param  \App\Models\ClientCase  $clientCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientCaseRequest $request, ClientCase $clientCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientCase  $clientCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientCase $clientCase)
    {
        //
    }
}
