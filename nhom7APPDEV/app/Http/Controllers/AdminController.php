<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function loginPost(Request $request){
    //     $credentials = $request->only('name','password');
    //     if(Auth::guard('admin')->attempt($credentials)){
    //         return redirect()->route('admin.dashboard');

    //     }else{
    //         echo 'sai';

    //     }
    // }
    
    // public function dashboard(){
    //     $adminUser = Auth::guard('admin')->user();
    //     return view ('admin.dashboard',['user'=>$adminUser]);
    // } 
    // public function logout(){
    //      Auth::guard('admin')->logout();

    //      return redirect('/admin/login');

    //     }

    public function Adminindex(){
        return view('admin.page.index');
    }

    
    public function Accountindex(Request $request){
        $query = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.description', '=', 'Staff')
            ->orWhere('roles.description', '=', 'Trainer')
            ->select('users.*');
    
        if($request->has('username')){
            $query->where('username', 'like', '%'.$request->username.'%');
        }
    
        if($request->has('role_id')){
            $query->where('role_id', '=', $request->role_id);
        }
    
        $account = $query->get();
        $role=Roles::all();
        return view('Admin.Page.Account.listAccount', compact('role', 'account'));
    }
    

    public function getAddAccount(){
        $role=Roles::all();
        return view('Admin.Page.Account.addAccount', compact('role'));
    }

    public function postAddAccount(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'username'=>'required',
                'password'=>'required',
                'role_id' => 'required|in:2,3' // Kiểm tra giá trị của role_id phải là 2 hoặc 3
            ]);
    
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            if(User::where('username', $request->username)->exists()) {
                return redirect()->back()->with('error', 'Username already exists. Please choose another one.')->withInput();
            }
            
            
    
            $account= new User;
            $account->username=$request->username;
            $account->password=Hash::make($request->password);
            $account->role_id=$request->role_id;
            $account->save();
            return redirect()->route('admin.account.index')->with('success','Add new Account Successfully!');

            
        }
        
    }
    

    public function getUpdateAccount($id){
        $role=Roles::all();
        $data['account']=User::find($id);
        return view('Admin.Page.Account.updateAccount', $data, compact('role'));
    }

    public function postUpdateAccount(Request $request, $id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[

            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $account= User::find($id);
            $account->username=$request->username;
            $account->password=Hash::make($request->password);
            $account->role_id=$request->role_id;
            $account->save();
            return redirect()->route('admin.account.index')->with('success','Update Account Successfully!');
        }
    }

    public function deleteAccount($id){
        $account=User::find($id);
        $account->delete();
        return back()->with('success', 'Delete user Successfully!');
    }

}

    

    

