<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Topics;
use App\Models\TraineeCourse;
use Illuminate\Http\Request;
use App\Models\TrainerTopics;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function Staffindex(){
        $totalUsers = DB::table('users')->count();
        return view('Staff.Page.indexStaff', compact('totalUsers'));
    }
 
    public function Traineeindex(){
        $trainee = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.description', '=', 'Trainee')
        ->select('users.*')
        ->get();    
        return view('Staff.Page.Trainee.listTrainee', compact('trainee'));
    }

    public function getAddTrainee(){
        return view('Staff.Page.Trainee.addTrainee');
    }
    public function postAddTrainee(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'username'=>'required|unique:users,username',
                'password'=>'required',               
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'department'=>'required',
                'type'=>'required',
                'academic_standard'=>'required',
                'age'=>'required',
                'date_of_birth'=>'required',
                'address'=>'required',
                'CERF_level'=>'required',
                'proficient_language'=>'required',
                
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $trainee= new User;
            $trainee->username=$request->username;
            $trainee->password=Hash::make($request->password);
            $trainee->name=$request->name;
            $trainee->email=$request->email;
            $trainee->phone=$request->phone;
            $trainee->department=$request->department;
            $trainee->date_of_birth=$request->date_of_birth;
            $trainee->address=$request->address;
            $trainee->type=$request->type;
            $trainee->academic_standard=$request->academic_standard;
            $trainee->age=$request->age;
            $trainee->CERF_level=$request->CERF_level;
            $trainee->proficient_language=$request->proficient_language;
            $trainee->role_id='4';
            $trainee->save();
            return redirect()->route('staff.trainee.index')->with('success','Add new Trainee Account Successfully!');
        }
    }
    public function getUpdateTrainee($id){
        $data['trainee']=User::find($id);
        return view('Staff.Page.Trainee.updateTrainee', $data);
    }


    public function postUpdateTrainee(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $trainee= User::find($id);
            $trainee->username=$request->username;
            $trainee->password=Hash::make($request->password);
            $trainee->name=$request->name;
            $trainee->email=$request->email;
            $trainee->phone=$request->phone;
            $trainee->date_of_birth=$request->date_of_birth;
            $trainee->address=$request->address;
            $trainee->type=$request->type;
            $trainee->academic_standard=$request->academic_standard;
            $trainee->age=$request->age;
            $trainee->CERF_level=$request->CERF_level;
            $trainee->proficient_language=$request->proficient_language;
            $trainee->save();
            return redirect()->route('staff.trainee.index')->with('success','Update Trainee Account Successfully!');

        }
    }
    public function deleteTrainee($id){
        $trainee=User::find($id);
        $trainee->delete();
        return back()->with('success', 'Delete Trainee Successfully!');
    }

    public function searchTrainee(Request $request){
        $search=$request->input('search');
        $trainee=User::query()->where('username','LIKE','%'.$search.'%')
        ->orwhere('CERF_level','LIKE','%'.$search.'%')
        ->orwhere('proficient_language','LIKE','%'.$search.'%')
        ->get();
        return view('Staff.Page.Trainee.searchTrainee', compact('trainee'), compact('search'));
    }

    //CATEGORY CONTROLLER//
    public function Categoryindex(){
        $category=Categories::all();
        return view('Staff.Page.Category.listCategory', compact('category'));
    }

    public function getAddCategory(){
        return view('Staff.Page.Category.addCategory');
    }

    public function postAddCategory(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'name'=>'required|unique:categories,name',
                'description'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $category= new Categories;
            $category->name=$request->name;
            $category->description=$request->description;
            $category->save();
            return redirect()->route('staff.category.index')->with('success','Add new Category Successfully!');
        }
    }
    public function getUpdateCategory($id){
        $data['category']=Categories::find($id);
        return view('Staff.Page.Category.updateCategory', $data);
    }

    public function postUpdateCategory(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $category= Categories::find($id);
            $category->name=$request->name;
            $category->description=$request->description;
            $category->save();
            return redirect()->route('staff.category.index')->with('success','Update Category Successfully!');
        }
    }

    public function deleteCategory($id) {
        $coursesCount = Courses::where('category_id', $id)->count();
        if ($coursesCount > 0) {
            return redirect()->back()->with('error', 'Some Courses is associated with this Category so this Category cannot be deleted!');
        }
        
        Categories::where('id', $id)->delete();
        return redirect()->route('staff.category.index')->with('success', 'Delete Category Successfully!');
    }

    public function searchCategory(Request $request){
        $search=$request->input('search');
        $category=Categories::query()->where('name','LIKE','%'.$search.'%')
        ->get();
        return view('Staff.Page.Category.searchCategory', compact('category'), compact('search'));
    }
    //Course//
    public function Courseindex(){
        $course=Courses::all();
        $category=Categories::all();
        return view('Staff.Page.Course.listCourse', compact('course', 'category'));
    }
    public function getAddCourse(){
        $category=Categories::all();
        return view('Staff.Page.Course.addCourse', compact('category'));
    }

    public function postAddCourse(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'name'=>'required|unique:courses,name',
                'description'=>'required',
                'category_id'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $course= new Courses;
            $course->name=$request->name;
            $course->description=$request->description;
            $course->category_id=$request->category_id;
            $course->save();
            return redirect()->route('staff.course.index')->with('success','Add new Course Successfully!');
        }
    }

    public function getUpdateCourse($id){
        $data['course']=Courses::find($id);
        $category=Categories::all();
        return view('Staff.Page.Course.updateCourse', $data, compact('category'));
    }

    public function postUpdateCourse(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $course= Courses::find($id);
            $course->name=$request->name;
            $course->description=$request->description;
            $course->category_id=$request->category_id;
            $course->save();
            return redirect()->route('staff.course.index')->with('success','Update Course Successfully!');
        }
    }

    public function deleteCourse($id) {
        $topicsCount = Topics::where('course_id', $id)->count();
        $trainerCount = TrainerTopics::where('user_id', $id)->count();
        if ($topicsCount > 0 || $trainerCount > 0) {
            return redirect()->back()->with('error', 'Some Topics is associated with this Course 
            or a Trainer was assigned to this Course. So this Course cannot be deleted!');
        }
        
        Courses::where('id', $id)->delete();
        return redirect()->route('staff.course.index')->with('success', 'Delete Course Successfully!');
    }

    public function searchCourse(Request $request){
        $search=$request->input('search');
        $course=Courses::query()->where('name','LIKE','%'.$search.'%')
        ->get();
        return view('Staff.Page.Course.searchCourse', compact('course', 'search'));
    }
    //TOPIC CONTROLLER//
    public function Topicindex(){
        $topic=Topics::all();
        $course=Courses::all();
        return view('Staff.Page.Topic.listTopic', compact('topic', 'course'));
    }

    public function getAddTopic(){
        $course=Courses::all();
        return view('Staff.Page.Topic.addTopic', compact('course'));
    }

    public function postAddTopic(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'name'=>'required|unique:topics,name',
                'description'=>'required',
                'course_id'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $topic= new Topics;
            $topic->name=$request->name;
            $topic->description=$request->description;
            $topic->course_id=$request->course_id;
            $topic->save();
            return redirect()->route('staff.topic.index')->with('success','Add new Topic Successfully!');
        }
    }

    public function getUpdateTopic($id){
        $data['topic']=Topics::find($id);
        $course=Courses::all();
        return view('Staff.Page.Topic.updateTopic', $data, compact('course'));
    }

    public function postUpdateTopic(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $topic= Topics::find($id);
            $topic->name=$request->name;
            $topic->description=$request->description;
            $topic->course_id=$request->course_id;
            $topic->save();
            return redirect()->route('staff.topic.index')->with('success','Update Topic Successfully!');
        }
    }

    public function deleteTopic($id) {
        $topicsCount = Topics::where('course_id', $id)->count();
        if ($topicsCount > 0) {
            return redirect()->back()->with('error', 'Some Topics is associated with this Course 
            or a trainer was assigned to this course. So this Course cannot be deleted!');
        }
        
        Topics::where('id', $id)->delete();
        return redirect()->route('staff.topic.index')->with('success', 'Delete Topics Successfully!');
    }
    //trainer//

    public function Trainerindex(){
        $trainer = DB::table('users')
        ->join('roles','users.role_id', '=', 'roles.id')
        ->where('roles.description','=', 'Trainer')
        ->select('users.*')
        ->get();
        return view('Staff.Page.Trainer.listTrainer', compact('trainer'));
    }

    public function getAddTrainer(){
        return view('Staff.Page.Trainer.addTrainer');
    }

    public function postAddTrainer(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'username'=>'required|unique:users,username',
                'password'=>'required',
                'name'=>'required',
                'department'=>'required',
                'phone'=>'required',
                'email'=>'required|email|unique:users,email',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $trainer= new User;
            $trainer->username=$request->username;
            $trainer->password=Hash::make($request->password);
            $trainer->name=$request->name;
            $trainer->type=$request->type;
            $trainer->department=$request->department;
            $trainer->phone=$request->phone;
            $trainer->email=$request->email;
            $trainer->role_id='3';
            $trainer->save();
            return redirect()->route('staff.trainer.index')->with('success','Add new Trainer Account Successfully!');
        }
    }

    public function getUpdateTrainer($id){
        $data['trainer']=User::find($id);
        return view('Staff.Page.Trainer.updateTrainer', $data);
    }

    public function postUpdateTrainer(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'username'=>'unique:users,username',

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $trainer= User::find($id);
            $trainer->username=$request->username;
            $trainer->password=Hash::make($request->password);
            $trainer->name=$request->name;
            $trainer->type=$request->type;
            $trainer->department=$request->department;
            $trainer->phone=$request->phone;
            $trainer->email=$request->email;
            $trainer->role_id='2';
            $trainer->save();
            return redirect()->route('staff.trainer.index')->with('success','Update Trainer Account Successfully!');
        }
    }

    public function deleteTrainer($id){
        $trainer=User::find($id);
        $trainer->delete();
        return back()->with('success', 'Delete Trainer Successfully!');;
    }
    //traineeCourse//
    public function TraineeCourseindex(){
        $courseTrainee = DB::table('trainee_courses')
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
        ->get();
        return view('Staff.Page.TraineeCourse.listTraineeCourse', compact('courseTrainee'));
    }
    public function getAddTraineeCourse(){
        $trainee = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.description', '=', 'Trainee')
        ->select('users.*')
        ->get();
        $course = Courses::all();
        return view('Staff.Page.TraineeCourse.addTraineeCourse', compact('trainee', 'course'));
    }
    public function postAddTraineeCourse(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            TraineeCourse::create([
                'user_id' => $request->input('user_id'),
                'course_id' => $request->input('course_id'),
            ]);
            return redirect()->route('staff.traineecourse.index')->with('success','Assign Course Successfully!');
        }
    } 
    public function getUpdateTraineeCourse($id){
        $trainee = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.description', '=', 'Trainee')
        ->select('users.*')
        ->get();
        $course = Courses::all();
        return view('Staff.Page.TraineeCourse.updateTraineeCourse', compact('trainee', 'course'));
    }

    public function postUpdateTraineeCourse(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $assign= TraineeCourse::find($id);
            $assign->user_id = $request->user_id;
            $assign->course_id = $request->course_id;
            $assign->save();
            return redirect()->route('staff.traineecourse.index')->with('success','Update Assigned Trainee Course Successfully!');
        }
    }

    public function deleteTraineeCourse($id){
        $assign=TraineeCourse::find($id);
        $assign->delete();
        return back()->with('success', 'Delete Assigned Trainee Course Successfully!');
    } 
    //trainer topic//
    public function TrainerTopicindex()
{
    $trainerTopics = DB::table('trainer_topics')
        ->join('users', 'trainer_topics.user_id', '=', 'users.id')
        ->join('topics', 'trainer_topics.topic_id', '=', 'topics.id')
        ->select(
            'trainer_topics.id', 
            'trainer_topics.user_id', 
            'users.name as trainer_name', 
            'trainer_topics.topic_id', 
            'topics.name as topic_name',
            'topics.description'
        )
        ->get();
    return view('Staff.Page.TrainerTopic.listTrainerTopic', compact('trainerTopics'));
}


    public function getAddTrainerTopic(){
        $trainer = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.description', '=', 'Trainer')
        ->select('users.*')
        ->get();
        $topic = Topics::all();
        return view('Staff.Page.TrainerTopic.addTrainerTopic', compact('trainer', 'topic'));
    }

    public function postAddTrainerTopic(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            TrainerTopics::create([
                'user_id' => $request->input('user_id'),
                'topic_id' => $request->input('topic_id'),
            ]);
            return redirect()->route('staff.trainertopic.index')->with('success','Assign Topic Successfully!');
        }
    }

    public function getUpdateTrainerTopic($id){
        $trainer = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.description', '=', 'Trainer')
        ->select('users.*')
        ->get();
        $topic = Topics::all();
        return view('Staff.Page.TrainerTopic.updateTrainerTopic', compact('trainer', 'topic'));
    }

    public function postUpdateTrainerTopic(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $assign= TrainerTopics::find($id);
            $assign->user_id = $request->user_id;
            $assign->topic_id = $request->topic_id;
            $assign->save();
            return redirect()->route('staff.trainertopic.index')->with('success','Update Assigned Topic Successfully!');
        }
    }

    public function deleteTrainerTopic($id){
        $assign=TrainerTopics::find($id);
        $assign->delete();
        return back()->with('success', 'Delete Assigned Topic Successfully!');
    }
    
    




}
