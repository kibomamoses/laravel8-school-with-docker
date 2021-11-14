<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    // is only for one route
    public function __invoke(){

        // only the published courses
        $courses = Course::where('status', '3')
            ->latest('id')
            ->get()
            ->take(12);

        return view('welcome', compact('courses'));
    }
}
