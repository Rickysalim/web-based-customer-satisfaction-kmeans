<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCorrespondent extends Model
{
    use HasFactory;

    protected $table = 'user_correspondent';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'purchase_frequency',
        'correspondents'
    ];
}
