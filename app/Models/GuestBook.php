<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'full_name',
        'position',
        'visit_date',
        'institution',
        'target_official',
        'purpose',
        'feedback',
    ];
}
