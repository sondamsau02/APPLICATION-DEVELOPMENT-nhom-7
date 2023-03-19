<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Topics;
use App\Models\TrainerCoures;
use App\Models\TrainerTopics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function Staffindex(){
        return view('Staff.Page.indexStaff');
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
    




}
