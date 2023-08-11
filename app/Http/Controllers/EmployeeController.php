<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $leave_types = LeaveType::where('user_id', Auth::id())->get();

        $employees = Employee::where('user_id', Auth::id())->get();

        return view(
            'employee.index',
            [
                'employees' => $employees,
                'leave_types' => $leave_types,
            ]
        );
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'age' => 'int|required',
            'salary' => 'nullable',
            'phone' => 'required',
            'position' => 'required|string',
        ]);

        Auth::user()->employees()->create($validated);


        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {

        return view('employee.show', [
            'employee' => $employee,
        ]);
    }

    public function edit(Employee $employee)
    {

        return view('employee.edit', [
            'employee' => $employee,
        ]);
    }

    public function update(Request $request, Employee $employee)
    {

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with([
                'employee' => $employee
            ]);
    }

    public function destroy(Employee $employee)
    {

        $employee->delete();

        return redirect()->route('employees.index');
    }
}
