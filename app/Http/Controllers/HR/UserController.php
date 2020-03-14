<?php

namespace App\Http\Controllers\HR;

use App\EmployeeFinalReport;
use App\Models\Hr\ManageProgram\School;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('hr.users.user_show', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $schools = School::all();
//        dd($schools);
        return view('hr.users.user_create', compact('roles','schools'));
    }

    public function getDepartments($id)
    {
        $departments = School::find($id)->departments;
        $template = '';
        foreach ($departments as $department) {
            $template .= '<option value="' . $department->id . '">' . $department->name . '</option>';
        }
        return response()->json(['data' => $template]);
//        $departments = School::find($id)->departments;
//        return $departments;
//        return response()->json(['data',$departments]);
    }

    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|not_in:default',
            'school_id' => 'not_in:default',
            'department_id' => 'not_in:default',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $user->assignRole($request->role);
        if($request->role=='teacher')
        {
            $emp_final = new EmployeeFinalReport();
            $emp_final->user_id = $user->id;
            $emp_final->save();
        }
//        $user->syncRoles([$request->role]);
        $user->save();
        return redirect()->route('users.index');
    }


}

