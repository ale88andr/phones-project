<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Employee;
use App\Organisation;
use App\Department;
use App\Position;

class EmployeeController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $organisations_list = Organisation::all('id', 'title');
        $departments_list = Department::all('id', 'title');
        $positions_list = Position::all('id', 'title');
        $employees = Employee::with(['organisation:id,title', 'department:id,title', 'position:id,title'])->get();
        return view('employees.index', compact('organisations_list', 'departments_list', 'positions_list', 'employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:255',
            'organisation_id' => 'required',
            'department_id' => 'required',
            'position_id' => 'required',
            'ip' => 'required'
        ]);

        $employee = new Employee;
        $employee->fullname = $request->fullname;
        $employee->organisation_id = $request->organisation_id;
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->ip = $request->ip;
        $employee->city = $request->city;
        $employee->save();

        return redirect('/employees');
    }

    public function destroy(Request $request, Employee $employee) {
        $employee->delete();
      
        return redirect('/employees');
    }
}
