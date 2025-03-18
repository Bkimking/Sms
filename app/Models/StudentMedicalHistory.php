<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentMedicalHistory extends Model
{
    protected $fillable = [
        'student_id',
        'medicalcondition',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
