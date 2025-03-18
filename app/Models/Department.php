<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments'; // Explicitly defining table name (optional)
    
    protected $fillable = [
        'department_name',
        'department_code',
        'department_description',
        'head_of_department',
    ];

    /**
     * Relationship: A department belongs to a head of department (teacher).
     */
    public function head()
    {
        return $this->belongsTo(User::class, 'head_of_department')->where('role', 4);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'depart_id');
    }
}
