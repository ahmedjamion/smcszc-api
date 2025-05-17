:: hello world

:: user
@REM php artisan make:model User --all --api
@REM php artisan make:model Role --all --api
:: pivot
@REM php artisan make:model RoleUser --pivot -m

:: school
php artisan make:model School --all --api
php artisan make:model SchoolYear --all --api

:: student
php artisan make:model Student --all --api
php artisan make:model StudentPersonalInfo --all --api
php artisan make:model Address --all --api
php artisan make:model SpecialNeeds
php artisan make:model ReturningStudent --all --api
php artisan make:model HealthNutrition --all --api
php artisan make:model PreferredLearningModality --all --api
php artisan make:model StudentStatus --all --api

:: registration
php artisan make:model Registration --all --api
php artisan make:model RegistrationStatus --all --api

:: registration
php artisan make:model Enrollment --all --api
php artisan make:model EnrollmentStatus --all --api

:: parent
php artisan make:model ParentGuardian --all --api
php artisan make:model ParentGuardianPersonalInfo --all --api

:: teacher
php artisan make:model Teacher --all --api
php artisan make:model TeacherPersonalInfo --all --api

:: address
php artisan make:model Address --all --api


:: grade level
php artisan make:model GradeLevel --all --api
php artisan make:model Section --all --api
php artisan make:model Subject --all --api

:: pivots
php artisan make:model SectionSubject --pivot -m
php artisan make:model AdviserSection --pivot -m
php artisan make:model SubjectTeacher --pivot -m

:: attendance
php artisan make:model Attendance --all --api

:: grades
php artisan make:model StudentGrade --all --api
php artisan make:model Assesment --all --api
php artisan make:model AssesmentResult --all --api
php artisan make:model GradingPeriod --all --api



