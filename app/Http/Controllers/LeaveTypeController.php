<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveTypeController extends Controller
{
    public function create()
    {
        return view('leaveTypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|string|unique:leave_types,leave_type',
            'description' => 'nullable|string',
        ]);

        Auth::user()->leaveTypes()->create($request->all());

        return redirect()->route('employees.index');
    }


    public function edit(LeaveType $leave_type)
    {
        return view('leaveTypes.edit' , [
            'leave_type' => $leave_type,
        ]);
    }

    public function update(Request $request, LeaveType $leave_type)
    {
        $leave_type->update($request->all());

        return redirect()->route('employees.index')
            ->with([
                'leave_type' => $leave_type,
            ]);
    }

    public function destroy(LeaveType $leave_type)
    {
        $leave_type->delete();

        return redirect()->route('employees.index')
            ->with([
                'leave_type' => $leave_type,
            ]);
    }
}
