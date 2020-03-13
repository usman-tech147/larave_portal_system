<?php

namespace App\Http\Controllers\HR\ManageProgram;

use App\Models\Hr\ManageProgram\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SchoolController extends Controller
{
    public function index()
    {
        return view('hr.manage_program.School.school');
    }

    public function getAllSchools()
    {
        $schools = School::all();

        return DataTables::of($schools)
            ->addColumn('action', function ($data) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$data->id.'" onclick="editSchool('.$data->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$data['id'].'" onclick="deleteSchool('.$data->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

    public function store(Request $request)
    {
        $rules =
            array(
                'name' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $school = new School($request->all());
        $school->save();

        return response()->json(['success' => 'Your activity is saved Successfully']);
    }

    public function edit($id)
    {
        $data = School::findOrFail($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $rules =
            array(
                'name' => 'required',
            );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $school = School::find($id);
        $school->fill($request->all());
        $school->update();

        return response()->json(['success' => 'School Record Edited Successfully']);
    }

    public function destroy($id)
    {
        School::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
