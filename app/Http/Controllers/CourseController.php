<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        // filter in CoursePolicy
        $this->authorize('published', $course);

        // query for recover the courses like the client is visiting
        // and without it, only the last five
        $similars = Course::where('category_id', $course->category_id)
                    ->where('id', '!=', $course->id)
                    ->where('status', 3)
                    ->latest('id')
                    ->take(5)
                    ->get();

        return view('courses.show', compact('course', 'similars'));
    }

    public function enrolled(Course $course)
    {
        // with the id of the user and the relation one to many
        // the user with the course is joined
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }

}
