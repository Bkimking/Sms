<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses'; // Define table name

    protected $fillable = [
        'course_name', 'course_code', 'course_description', 'course_img',
        'depart_id', 'teacher_id', 'category'
    ];

    public function subCourses(): HasMany
    { 
        return $this->hasMany(SubCourse::class, 'course_id');
    }

    /**
     * Relationship: Course belongs to a Department
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'depart_id');
    }

    /**
     * Relationship: Course belongs to a Teacher
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->where('role', 4);
    }
}
