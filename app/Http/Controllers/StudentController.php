<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all students
        // todo: 
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        // create a new student
        // todo:
        return Student::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // return student by id
        // todo:
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // update student by id
        return $student->update($request->validated());

        // todo: maybe return something more useful in the future
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // delete student by id
        return $student->delete(); // returns true or false

        // todoe: maybe return something more useful in the future
    }
}
