<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;


    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
