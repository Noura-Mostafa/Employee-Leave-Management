<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function employee()
    {
        $leave_requests = LeaveRequest::where('user_id' , Auth::id())->get();

        return view('leaveRequests.employee' , [
            'leave_requests' => $leave_requests,
        ]);
    }

    public function index()
    {
        $leave_requests = LeaveRequest::all();

        return view('leaveRequests.index' , [
            'leave_requests' => $leave_requests,
        ]);
    }

    public function create()
    {
        $leave_types = LeaveType::get();

        return view('leaveRequests.create', [
            'leave_types' => $leave_types,
        ]);
    }

    public function store(Request $request)
    {

        $validated= $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'employee_name' => 'required|string',
            'reason' => 'string',
        ]);

        $validated['user_id'] = Auth::user()->id;

        LeaveRequest::create($validated);


        return redirect()->route('requests.employee');
    }

    public function show(LeaveRequest $leave_request)
    {
        $leave_types = LeaveType::get();

        return view('leaveRequests.show', [
            'leave_types' => $leave_types,
            'leave_request' => $leave_request,
        ]);
    }


    public function approve(LeaveRequest $leave_request)
    {
        $leave_request->update([
            'status' => 'accepted',
            'reject_reason' => null,
        ]);

        return redirect()->route('requests.index');
    }


    public function deny(LeaveRequest $leave_request ,Request $request)
    {
        $leave_request->update([
            'status' => 'rejected',
            'reject_reason' => $request->input('reject_reason'),
            ]);

        return redirect()->route('requests.index');
    }


    public function destroy(LeaveRequest $leave_request)
    {
        $leave_request->delete();
        return redirect()->route('requests.employee');
    }
}
