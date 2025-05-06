<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'name', 'photo', 'course', 'year', 'occupation', 'company', 'statement'
    ];
}
