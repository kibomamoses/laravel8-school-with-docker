<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\Category;
use App\Models\Level;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();
        $courses = Course::where('status', 3)
            // this two function is in the Course class, is a query
            // customize for level and category the functions are
            // scopeCategory and scopeLevel, always with scope in the 
            // beginnig of the function's name
            ->category($this->category_id)
            ->level($this->level_id)
            ->latest('id')
            ->paginate(8);

        return view('livewire.courses-index', compact('courses', 'categories', 'levels'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }
}
