<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'surname', 'firstname', 'middlename', 'email', 'dob', 'idnumber', 'gender','marital_status', 
        'tshirtsize', 'homeaddress', 'county', 'subcounty', 'tel','agreetorules', 'kcpe_certificate', 'kcse_certificate',
    ];

    public function guardian()
    {
        return $this->hasOne(StudentGuardian::class);
    }

    public function course()
    {
        return $this->belongsTo(StudentCourse::class);
    }

    public function academicHistories()
    {
        return $this->hasMany(StudentAcademicHistory::class);
    }

    public function medicalHistory()
    {
        return $this->hasOne(StudentMedicalHistory::class);
    }
}

