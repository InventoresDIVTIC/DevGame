<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'user_id',
        'deads',
        'errors',
        'extraPoints',
        'time'
    ];

}
