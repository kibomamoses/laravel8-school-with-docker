<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * This function is used to change something on the website
     * for example if the user is or not enrolled, if he is 
     * enrolled change the button from go to continue in show.blade.php
     * using @can
     */
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    // only access to the courses with status 3, published
    // first check if the user is authenticated, use ? en User
    public function published(?User $user, Course $course)
    {
        if($course->status == 3){
            return true;
        }else{
            return false;
        }
    }
}
