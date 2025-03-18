<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAcademicHistory extends Model
{
    protected $fillable = [
        'student_id',
        'primaryschoolname',
        'primaryyear',
        'primarygrade',
        'secondaryschoolname',
        'secondaryyear',
        'secondarygrade',
        'tertiaryschoolname',
        'tertiaryyear',
        'tertiarygrade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

