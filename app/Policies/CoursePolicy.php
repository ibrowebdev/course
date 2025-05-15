<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Course $course)
    {
        return $course->users()->where('user_id', $user->id)->exists(); 
    }
    public function apiView(User $user, Course $course)
    {
        return $course->users()->where('user_id', $user->id)->exists();        
    }
}
