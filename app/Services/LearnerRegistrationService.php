<?php

namespace App\Services;

use App\Models\LearnerPersonalInfo;
use App\Models\ParentGuardian;
use App\Models\ParentGuardianPersonalInfo;
use App\Models\PreferredLearningModality;
use Illuminate\Support\Facades\DB;

class LearnerRegistrationService
{
    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Save learner info

            $personalInfo = $data['personalInfo'];

            $learner = LearnerPersonalInfo::create([
                'psa_birth_certificate_no' => $personalInfo['psaBirthCertificateNo'] ?? null,
                'first_name' => $personalInfo['firstName'] ?? null,
                'last_name' => $personalInfo['lastName'] ?? null,
                'middle_name' => $personalInfo['middleName'] ?? null,
                'extension_name' => $personalInfo['extensionName'] ?? null,
                'birth_date' => $personalInfo['birthDate'] ?? null,
                'age' => $personalInfo['age'] ?? null,
                'sex' => $personalInfo['sex'] ?? null,
                'place_of_birth' => $personalInfo['placeOfBirth'] ?? null,
                'religion' => $personalInfo['religion'] ?? null,
                'mother_tongue' => $personalInfo['motherTounge'] ?? null,
                'is_indigenous_community_member' => $personalInfo['isIndigenousCommunityMemeber'] ?? false,
                'community' => $personalInfo['community'] ?? null,
                'is_4ps_beneficiary' => $personalInfo['is4PsBeneficiary'] ?? false,
                'household_no' => $personalInfo['houseHoldIdNumber'] ?? null,
            ]);

            $currentAddress = $personalInfo['currentAddress'];

            $learner->currentAddress()->create([
                'house_no' => $currentAddress['houseNo'] ?? null,
                'street_name' => $currentAddress['streetName'] ?? null,
                'barangay' => $currentAddress['barangay'] ?? null,
                'municipality_city' => $currentAddress['municipalityCity'] ?? null,
                'province' => $currentAddress['province'] ?? null,
                'country' => $currentAddress['country'] ?? null,
                'zip_code' => $currentAddress['zipCode'] ?? null,
            ]);

            $permanentAddress = $personalInfo['permanentAddress'];

            if ($permanentAddress['isCurrentAddress'] === true) {
                $permanentAddress = $currentAddress;
            }

            $learner->permanentAddress()->create([
                'house_no' => $permanentAddress['houseNo'] ?? null,
                'street_name' => $permanentAddress['streetName'] ?? null,
                'barangay' => $permanentAddress['barangay'] ?? null,
                'municipality_city' => $permanentAddress['municipalityCity'] ?? null,
                'province' => $permanentAddress['province'] ?? null,
                'country' => $permanentAddress['country'] ?? null,
                'zip_code' => $permanentAddress['zipCode'] ?? null,
            ]);

            $parentGuardianInfo = $data['parentGuardiansInfo'];
            $mother = $parentGuardianInfo['mother'];
            $learner->mother()->create([
                'first_name' => $mother['firstName'] ?? null,
                'last_name' => $mother['lastName'] ?? null,
                'middle_name' => $mother['middleName'] ?? null,
                'contact_number' => $mother['contactNumber'] ?? null,
            ]);

            $father = $parentGuardianInfo['father'];
            $learner->father()->create([
                'first_name' => $father['firstName'] ?? null,
                'last_name' => $father['lastName'] ?? null,
                'middle_name' => $father['middleName'] ?? null,
                'contact_number' => $father['contactNumber'] ?? null,
            ]);

            $guardian = $parentGuardianInfo['mother'];
            $learner->guardian()->create([
                'first_name' => $guardian['firstName'] ?? null,
                'last_name' => $guardian['lastName'] ?? null,
                'middle_name' => $guardian['middleName'] ?? null,
                'contact_number' => $guardian['contactNumber'] ?? null,
            ]);

            $specialNeeds = $data['specialNeeds'];
            $learner->specialNeeds()->create([
                'is_under_special_needs_program' => $specialNeeds['isUnderSpecialNeedsProgram'],
                'with_diganosis' => $specialNeeds['withDiagnosis'],
                'with_manifestations' => $specialNeeds['withManifestations'],
                'with_chronic_disease' => $specialNeeds['withChronicDisease'],
                'with_visual_impairment' => $specialNeeds['withVisualImpairment'],
                'has_pwd_id' => $specialNeeds['hasPwdId'],
            ]);

            $returningLearner = $data['returningLearner'];
            $learner->returningLearner()->create([
                'last_grade_level_completed' => $returningLearner['lastGradeLevelCompleted'],
                'last_school_atteded' => $returningLearner['lastSchoolAttended'],
                'last_school_year_completed' => $returningLearner['lastSchoolYearCompleted'],
                'schoo_id' => $returningLearner['schoolId'],
            ]);

            $prefferedLearningModalities = $data['preferredLearningModality'];

            $prefferedLearningModalityIds = PreferredLearningModality::whereIn('name', $prefferedLearningModalities)
                ->pluck('id')->toArray();

            $learner->preferredLearningModalities()->sync($prefferedLearningModalityIds);

            $learner->registration();



            return $learner;
        });
    }
}
