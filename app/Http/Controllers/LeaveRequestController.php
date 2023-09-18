<?php

namespace App\Http\Controllers;

use App\Events\RequestCreated;
use App\Events\RequestResponse;
use App\Models\LeaveType;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function employee()
    {
        $leave_requests = LeaveRequest::where('user_id', Auth::id())->get();

        return view('leaveRequests.employee', [
            'leave_requests' => $leave_requests,
        ]);
    }

    public function index()
    {
        $leave_requests = LeaveRequest::all();

        return view('leaveRequests.index', [
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

    public function store(Request $request, LeaveRequest $leaveRequest)
    {

        $validated = $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'employee_name' => 'required|string',
            'reason' => 'string',
            'start_date' => 'date',
            'duration' => 'int|required',
        ]);

        $validated['user_id'] = Auth::user()->id;

        LeaveRequest::create($validated);

        event(new RequestCreated($leaveRequest));

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


    public function approve(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update([
            'status' => 'accepted',
            'reject_reason' => null,
        ]);

        event(new RequestResponse($leaveRequest));

        return redirect()->route('requests.index');
    }


    public function deny(Request $request , LeaveRequest $leaveRequest)
    {
        $leaveRequest->update([
            'status' => 'rejected',
            'reject_reason' => $request->input('reject_reason'),
        ]);

        event(new RequestResponse($leaveRequest));


        return redirect()->route('requests.index');
    }


    public function destroy(LeaveRequest $leave_request)
    {
        $leave_request->delete();
        return redirect()->route('requests.employee');
    }
}
