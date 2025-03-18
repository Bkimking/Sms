<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'surname',
        'first_name',
        'email',
        'dob',
        'gender',
        'tel',
        'kcpe_certificate',
        'kcse_certificate',
        'kin_name',
        'kin_email',
        'kin_id',
        'kin_tel',
        'course_id',
        'subcourse_id',
        'status',
    ];

    // Define relationships
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function subcourse()
    {
        return $this->belongsTo(SubCourse::class, 'subcourse_id');
    }
}
