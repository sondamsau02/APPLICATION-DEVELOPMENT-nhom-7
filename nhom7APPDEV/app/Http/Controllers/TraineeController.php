<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class TraineeController extends Controller
{
    //
    public function Traineeindex() {
        return view('Trainee.Page.indexTrainee');
    }

    public function Profileindex() {
        $account=Auth::user();
        return view('Trainee.Page.Profile.profileAccount', compact('account'));
    }
    
    

    public function Courseindex() {
        $user = Auth::user(); // Assuming the user is logged in
        $traineeCourses = DB::table('trainee_courses')
        ->join('users', 'trainee_courses.user_id', '=', 'users.id')
        ->join('courses', 'trainee_courses.course_id', '=', 'courses.id')
        ->select(
            'trainee_courses.id', 
            'trainee_courses.user_id', 
            'users.name as trainee_name', 
            'trainee_courses.course_id', 
            'courses.name as course_name',
            'courses.description'
        )
        ->where('user_id', $user->id)->get();
        return view('Trainee.Page.Course.listCourse', compact('traineeCourses'));
    }

}
