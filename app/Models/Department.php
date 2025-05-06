<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'short_desc',
        'full_desc',
        'banner_pic',
        'facility_pic',
        'facility_pic2',
    ]; 

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}
