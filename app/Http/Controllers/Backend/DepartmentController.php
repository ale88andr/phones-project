<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Organisation;
use App\Department;

class DepartmentController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $organisations_list = Organisation::all('id', 'title');
        $departments = Department::with('organisation')->get();
        return view('departments.index', compact('organisations_list', 'departments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'organisation_id' => 'required',
        ]);

        $department = new Department;
        $department->title = $request->title;
        $department->organisation_id = $request->organisation_id;
        $department->save();

        return redirect('/departments');
    }

    public function destroy(Request $request, Department $department) {
        $department->delete();
      
        return redirect('/departments');
    }
}
