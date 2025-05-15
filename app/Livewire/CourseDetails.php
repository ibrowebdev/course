<?php

namespace App\Livewire;

use App\Mail\CommentMail;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CourseDetails extends Component
{
    use AuthorizesRequests;
    public $course;
    public $comment;
    public function mount(Course $id){
        $this->authorize('view', $id);
        $this->course = $id;
    }

    public function submitComment(){
        $this->validate([
            'comment' => 'required'
        ]);
        $this->course->comments()->create([
            'user_id' => Auth::user()->id,
            'message' => $this->comment
        ]);
        Mail::to(Auth::user()->email)->queue(
            new CommentMail($this->course, $this->comment)
        );
        $this->reset('comment');

        
    }
    public function deleteComment($commentId){
        $comment = Comment::where('id', $commentId)
                            ->where('course_id', $this->course->id)
                            ->where('user_id', auth()->user()->id)
                            ->firstOrFail();
        $comment->delete();
        
    }
    public function render()
    {
            return view('livewire.course-details', [
                'course' => $this->course->load(['comments.user'])
            ]);
        
    }
}
