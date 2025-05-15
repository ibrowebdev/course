<?php

namespace App\Livewire;

use App\Mail\CourseEnrol;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CourseList extends Component
{
    use WithPagination;
    #[Url(history:true, as:"filter")]
    public $filter;
    public function filterTable($tableFilter){
        $this->filter = $tableFilter;
    }
    public function resetFilter(){
        $this->reset();
    }
    public function enrol($courseId){
        Auth::user()->enrolledCourses()->attach($courseId);
        $mailableCourseID = Course::find($courseId);
        Mail::to(Auth::user()->email)->queue(
            new CourseEnrol($mailableCourseID)
        );
    }
    public function cancelEnrol($courseId){
        Auth::user()->enrolledCourses()->detach($courseId);
    }
    public function viewCourse($courseId){
        return redirect('course/'.$courseId);
    }
    public function render()
    {
        $user = Auth::user();
        $course = Course::with(['users', 'comments']);
        if($this->filter === 1){
            $course->whereHas('users', fn($q) => $q->where('user_id', $user->id));
        }elseif($this->filter === 0){
            $course->whereDoesntHave('users', fn($q) => $q->where('user_id', $user->id));
        }
        return view('livewire.course-list', [
            'courses' => $course->simplePaginate(10)
        ]);
    }
}
