<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $data['Trainee']=User::find($id);
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


}
