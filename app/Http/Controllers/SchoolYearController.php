<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(SchoolYear::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolYearRequest $request)
    {
        //
        $schoolYear = SchoolYear::create($request->validated());

        return response()->json([
            'message' => 'School year created successfully.',
            'data' => $schoolYear
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {
        //
        return response()->json($schoolYear);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolYearRequest $request, SchoolYear $schoolYear)
    {
        //
        $schoolYear->update($request->validated());

        return response()->json([
            'message' => 'School year updated successfully.',
            'data' => $schoolYear
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        //
        $schoolYear->delete();

        return response()->json([
            'message' => 'School year deleted successfully.'
        ]);
    }
}
