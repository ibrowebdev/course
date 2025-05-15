<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    use AuthorizesRequests;
    public function allenrolledCourse(Request $request){
        $course = $request->user()->enrolledCourses;
        return response()->json(['course' => $course]);
    }
    public function viewEachCourseWithComment(Request $request, Course $id){
        $this->authorize('apiView', $id);
        $course = $id->load(['comments' => fn($q) => $q->oldest()->take(5), 'comments.user']);
        
        return response()->json(['courses' => $course]);
    }
    public function viewComment(Request $request, Course $id){
        $this->authorize('apiView', $id);
        $comment = $id->comments;
        return response()->json(['comments' => $comment]);
    }
    public function postComment(Request $request, Course $id){
        $this->authorize('apiView', $id);
        $newComment = $id->comments()->create([
            'user_id' => $request->user()->id,
            'message' => $request->comment
        ]);
        if($newComment){
            return response()->json(['message' => 'Comment added!']);
        }else{
            return response()->json(['error' => 'Unable to add comment!']);
        }
    }
}
