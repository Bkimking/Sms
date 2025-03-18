<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrolledBy extends Model
{
    /**
     * Define fillable attributes for mass assignment.
     */
    protected $fillable = [
        'student_id',
        'admin_id',
        'recommendation_status',
        'recommendation_reason',
        'action_taken',
        'follow_up_action',
    ];

    /**
     * Relationship with the Student model.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relationship with the User model for admin.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
