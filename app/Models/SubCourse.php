<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCourse extends Model
{
    use HasFactory;

    protected $table = 'sub_courses'; // Specify table name

    protected $fillable = ['course_id', 'sub_course_name', 'sub_course_code', 'sub_course_description', 'sub_course_img'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

