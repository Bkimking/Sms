<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderItem extends Model
{
    protected $table = 'headeritem';

    // The attributes that are mass assignable
    protected $fillable = [
        'headertitle',
        'headersubtitle',
        'headerparagraph',
        'headerimg',
    ];

}
