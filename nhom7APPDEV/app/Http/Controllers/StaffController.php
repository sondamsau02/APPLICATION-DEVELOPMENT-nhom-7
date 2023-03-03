<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controller\log;    
use Illuminate\Support\Facades\Hash as FacadesHash;

class StaffController extends Controller
{
    public function index()
    {
        $staffList = Staff::all();
        return view('admin.staff.index', compact('staffList'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff',
            'password' => 'required|min:8'
        ]);

        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->password = Hash::make($request->input('password'));

        $staff->save();

        return redirect()->route('admin.staff')->with('success', 'Tài khoản staff đã được thêm mới');

    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:staff,email,' . $id,
        'password' => 'required|min:8'
    ]);

    $staff = Staff::find($id);
    $staff->name = $request->input('name');
    $staff->email = $request->input('email');
    if (!empty($request->input('password'))) {
        $staff->password = Hash::make($request->input('password'));
    }

    $staff->save();

    return redirect()->route('admin.staff.index')->with('success', 'Tài khoản staff đã được cập nhật');
}


    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Tài khoản staff đã được xóa');
    }
}
