<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(GradeLevel::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'level_order' => 'required|integer',
        ]);

        // Create new GradeLevel record
        $gradeLevel = GradeLevel::create($validated);

        // Return created resource with 201 status code
        return response()->json($gradeLevel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $gradeLevel = GradeLevel::find($id);

        // Check if grade level exists
        if (!$gradeLevel) {
            // Return 404 response if not found
            return response()->json(['message' => 'Grade Level not found'], 404);
        }

        // Return grade level data as JSON
        return response()->json($gradeLevel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'level_order' => 'required|integer',
        ]);

        // Find the grade level by ID
        $gradeLevel = GradeLevel::find($id);

        // If not found, return a 404 response
        if (!$gradeLevel) {
            return response()->json(['message' => 'Grade level not found'], 404);
        }

        // Update the grade level
        $gradeLevel->update($validated);

        // Return the updated data
        return response()->json($gradeLevel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $gradeLevel = GradeLevel::find($id);

        if (!$gradeLevel) {
            return response()->json(['message' => 'Grade Level not found'], 404);
        }

        $gradeLevel->delete();

        return response()->json(['message' => 'Grade Level deleted successfully'], 200);
    }
}
