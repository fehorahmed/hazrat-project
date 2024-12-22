<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class, 'trainee_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }
    public function present_division()
    {
        return $this->belongsTo(Division::class, 'present_division_id', 'id');
    }

    public function present_district()
    {
        return $this->belongsTo(District::class, 'present_district_id', 'id');
    }
    public function present_upazila()
    {
        return $this->belongsTo(Upazila::class, 'present_upazila_id', 'id');
    }
    public function education()
    {
        return $this->belongsTo(Education::class, 'last_education_id', 'id');
    }

    public function courseDuration()
    {
        return $this->belongsTo(CourseDuration::class, 'computer_course_duration', 'id');
    }

    public function instituteType()
    {
        return $this->belongsTo(InstituteType::class, 'institute_type_id', 'id');
    }
}
