<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearnerRegistrationRequest;
use App\Services\LearnerRegistrationService;

class LearnerRegistrationController extends Controller
{
    protected $service;

    public function __construct(LearnerRegistrationService $service)
    {
        $this->service = $service;
    }

    public function store(LearnerRegistrationRequest $request)
    {
        $learner = $this->service->register($request->validated());

        return response()->json(['message' => 'Registered successfully', 'learner_id' => $learner->id]);
    }
}
