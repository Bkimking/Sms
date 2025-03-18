<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffid extends Model
{
    use HasFactory;

    // Specify the table name (optional, only if different from Laravel's naming convention)
    protected $table = 'staffids';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'staff_id',
    ];

    /**
     * Relationship: A Staff ID belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
