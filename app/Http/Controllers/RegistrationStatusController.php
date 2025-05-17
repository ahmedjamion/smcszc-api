<?php

namespace App\Http\Controllers;

use App\Models\RegistrationStatus;
use App\Http\Requests\StoreRegistrationStatusRequest;
use App\Http\Requests\UpdateRegistrationStatusRequest;

class RegistrationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrationStatus $registrationStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationStatusRequest $request, RegistrationStatus $registrationStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationStatus $registrationStatus)
    {
        //
    }
}
