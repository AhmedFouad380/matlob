<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault([
            'name' => '',
        ]);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault([
            'name' => '',
        ]);
    }
    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id')->withDefault([
            'company_name' => '',
        ]);
    }

    public function ExperienceCategory()
    {
        return $this->belongsTo(ExperienceCategory::class, 'experience_category_id')->withDefault([
            'name' => '',
        ]);
    }
    public function JobQualification()
    {
        return $this->belongsTo(JobQualification::class, 'job_qualification_id')->withDefault([
            'name' => '',
        ]);
    }
    public function JobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id')->withDefault([
            'name' => '',
        ]);
    }


}
