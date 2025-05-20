<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearnerRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'learnerReferenceNo' => 'nullable|string|max:50',
            'schoolYear' => 'required|string|max:20',

            'gradeLevelToEnroll.graded.isGraded' => 'required|boolean',
            'gradeLevelToEnroll.graded.gradeLevel' => 'nullable|string|max:50',
            'gradeLevelToEnroll.nonGraded.isNonGraded' => 'required|boolean',

            'personalInfo.psaBirthCertificateNo' => 'nullable|string|max:50',
            'personalInfo.firstName' => 'required|string|max:50',
            'personalInfo.lastName' => 'required|string|max:50',
            'personalInfo.middleName' => 'nullable|string|max:50',
            'personalInfo.extensionName' => 'nullable|string|max:10',
            'personalInfo.birthDate' => 'required|date',
            'personalInfo.age' => 'nullable|numeric',
            'personalInfo.sex' => 'required|in:Male,Female',
            'personalInfo.placeOfBirth' => 'nullable|string|max:100',
            'personalInfo.religion' => 'nullable|string|max:50',
            'personalInfo.motherTounge' => 'nullable|string|max:50',
            'personalInfo.isIndigenousCommunityMember' => 'required|boolean',
            'personalInfo.community' => 'nullable|string|max:100',
            'personalInfo.is4PsBeneficiary' => 'required|boolean',
            'personalInfo.houseHoldIdNumber' => 'nullable|string|max:50',

            'personalInfo.currentAddress.houseNo' => 'nullable|string|max:20',
            'personalInfo.currentAddress.streetName' => 'nullable|string|max:100',
            'personalInfo.currentAddress.barangay' => 'nullable|string|max:100',
            'personalInfo.currentAddress.municipalityCity' => 'nullable|string|max:100',
            'personalInfo.currentAddress.province' => 'nullable|string|max:100',
            'personalInfo.currentAddress.country' => 'nullable|string|max:100',
            'personalInfo.currentAddress.zipCode' => 'nullable|string|max:20',

            'personalInfo.permanentAddress.isCurrentAddress' => 'required|boolean',
            'personalInfo.permanentAddress.houseNo' => 'nullable|string|max:20',
            'personalInfo.permanentAddress.streetName' => 'nullable|string|max:100',
            'personalInfo.permanentAddress.barangay' => 'nullable|string|max:100',
            'personalInfo.permanentAddress.municipalityCity' => 'nullable|string|max:100',
            'personalInfo.permanentAddress.province' => 'nullable|string|max:100',
            'personalInfo.permanentAddress.country' => 'nullable|string|max:100',
            'personalInfo.permanentAddress.zipCode' => 'nullable|string|max:20',

            'parentGuardiansInfo.father.firstName' => 'nullable|string|max:50',
            'parentGuardiansInfo.father.lastName' => 'nullable|string|max:50',
            'parentGuardiansInfo.father.middleName' => 'nullable|string|max:50',
            'parentGuardiansInfo.father.contactNumber' => 'nullable|string|max:15',

            'parentGuardiansInfo.mother.firstName' => 'nullable|string|max:50',
            'parentGuardiansInfo.mother.lastName' => 'nullable|string|max:50',
            'parentGuardiansInfo.mother.middleName' => 'nullable|string|max:50',
            'parentGuardiansInfo.mother.contactNumber' => 'nullable|string|max:15',

            'parentGuardiansInfo.guardian.firstName' => 'nullable|string|max:50',
            'parentGuardiansInfo.guardian.lastName' => 'nullable|string|max:50',
            'parentGuardiansInfo.guardian.middleName' => 'nullable|string|max:50',
            'parentGuardiansInfo.guardian.contactNumber' => 'nullable|string|max:15',

            'specialNeeds.isUnderSpecialNeedsProgram' => 'required|boolean',
            'specialNeeds.withDiagnosis' => 'nullable|string',
            'specialNeeds.withManifestations' => 'nullable|string',
            'specialNeeds.withChronicDisease' => 'nullable|string',
            'specialNeeds.withVisualImpairment' => 'nullable|string',
            'specialNeeds.hasPwdId' => 'required|boolean',

            'returningLearner.lastGradeLevelCompleted' => 'nullable|string|max:50',
            'returningLearner.lastSchoolAttended' => 'nullable|string|max:100',
            'returningLearner.lastSchoolYearCompleted' => 'nullable|string|max:10',
            'returningLearner.schoolId' => 'nullable|string|max:20',

            'preferredLearningModalities.blended' => 'required|boolean',
            'preferredLearningModalities.educationalTelevision' => 'required|boolean',
            'preferredLearningModalities.homeSchooling' => 'required|boolean',
            'preferredLearningModalities.modularDigital' => 'required|boolean',
            'preferredLearningModalities.modularPrint' => 'required|boolean',
            'preferredLearningModalities.online' => 'required|boolean',
            'preferredLearningModalities.radioBased' => 'required|boolean',

            'declaration.agreed' => 'required|boolean',
            'declaration.printedName' => 'required|string|max:100',
            'declaration.dateAgreed' => 'required|date',

        ];
    }
}
