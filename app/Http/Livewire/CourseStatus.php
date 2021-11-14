<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;
    public $course, $current;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
            break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        // only if the user is enrolled can enter to the course
        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    // Methods

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;

    }

    public function completed()
    {
        if($this->current->completed){
            // delete data with detach
            // access to the relation with () 
            $this->current->users()->detach(auth()->user()->id);
        }else{
            // add data whith attach
            $this->current->users()->attach(auth()->user()->id);

        }

        // find the current to update the icons
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }


    // Properties

    // with getNameProperty automaticaly create the variable
    // name and return the change in name
    // must to put $this->name to call the variable in blade
    public function getIndexProperty()
    {
        // with pluck we recover the id of all the lessons
        return $this->index = $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if($this->index == 0){
            return null;
        }else{
            return $this->previous = $this->course->lessons[$this->index - 1];
        }
    }
    
    public function getNextProperty()
    {
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
            return $this->next = $this->course->lessons[$this->index + 1];
        }
    }
    
    public function getAdvanceProperty()
    {
        $i = 0;

        foreach($this->course->lessons as $lesson){
            if($lesson->completed){
                $i++;;
            }
        }

        $advance = ($i * 100 / ($this->course->lessons->count()));

        return round($advance, 2);
    }


}
