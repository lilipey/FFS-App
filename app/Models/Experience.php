<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $casts = [
        'date_of_the_event' => 'date',
        'status' => 'integer',
    ];

    
    
    
}
