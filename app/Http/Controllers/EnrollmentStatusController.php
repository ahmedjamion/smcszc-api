<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentStatus;
use App\Http\Requests\StoreEnrollmentStatusRequest;
use App\Http\Requests\UpdateEnrollmentStatusRequest;

class EnrollmentStatusController extends Controller
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
    public function store(StoreEnrollmentStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EnrollmentStatus $enrollmentStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentStatusRequest $request, EnrollmentStatus $enrollmentStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnrollmentStatus $enrollmentStatus)
    {
        //
    }
}
