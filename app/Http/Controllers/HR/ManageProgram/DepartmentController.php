<?php

namespace App\Http\Controllers\HR\ManageProgram;

use App\Models\Hr\ManageProgram\Department;
use App\Models\Hr\ManageProgram\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('hr.manage_program.Department.department');
    }

    public function getAllDepartments()
    {
        $departments = Department::with('school')->get();
        return DataTables::of($departments)
            ->addColumn('school',function ($data){
                return $data->find($data['id'])->school['name'];
            })
            ->addColumn('action', function ($data) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$data->id.'" onclick="editDepartment('.$data->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$data['id'].'" onclick="deleteDepartment('.$data->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

    public function getSchools()
    {
        $schools = School::select('id','name')->get();
        $data = '';
        foreach ($schools as $school) {
            $data .= '<option value="' . $school->id . '">' . $school->name . '</option>';
        }
        return response()->json(['data' => $data]);
    }


    public function store(Request $request)
    {
        $rules =
            array(
                'school_id' => 'required|not_in:default',
                'name' => 'required|unique:departments',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $department = new Department($request->all());
        $department->save();

        return response()->json(['success' => 'Your activity is saved Successfully']);
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        $schools =School::select('id','name')->get();
        $template = '<option value="default">Select School</option>';
        foreach ($schools as $school) {
            if($school->id == $data->school_id)
            {
                $template .= '<option value="' . $school->id . '" selected >' . $school->name . '</option>';
            }
            else{
                $template .= '<option value="' . $school->id . '" >' . $school->name . '</option>';
            }

        }
        return response()->json(['data' => $data,'template'=>$template]);
    }


    public function update(Request $request, $id)
    {
        $rules =
            array(
                'school_id' => 'required|not_in:default',
                'name' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }

        $department = Department::find($id);
        $department->fill($request->all());
        $department->update();

        return response()->json(['success' => 'Department Record Edited Successfully']);
    }

    public function destroy($id)
    {
        Department::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
