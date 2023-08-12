<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class EmployeeController extends Controller
{
    public function index()
    {
        $leave_types = LeaveType::where('user_id', Auth::id())->get();

        $employees = User::where('role', 'employee')->get();

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'phone' =>['required' , 'string'],
            'age' => ['int','required'],
            'position' => ['required','string'],
        ]);

        $employees = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'employee',
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'position' => $request->position
        ]);


        return redirect()->route('employees.index')
            ->with(['employees' => $employees]);
    }

    public function show(User $employee)
    {        
        return view('employee.show', compact('employee'));
    }

    public function edit(User $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, User $employee)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required' , 'string'],
            'age' => ['int','required'],
            'position' => ['required','string'],
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with([
                'user' => $employee
            ]);
    }

    public function destroy(User $employee)
    {

        $employee->delete();

        return redirect()->route('employees.index');
    }
}
