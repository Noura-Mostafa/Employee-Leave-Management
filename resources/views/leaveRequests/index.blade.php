<x-app-layout>

    <div class="container p-5 mt-5 bg-white">

        <h2 class="fs-2">Leave Requests</h2>

        <div class="mt-4">
            @forelse($leave_requests as $leave_request)
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h4 class="fs-4">{{$leave_request->employee_name}} has request to leave</h4>
                    <h6 class="fs-6 mt-3">Leave Reason :{{$leave_request->reason}}</h6>
                    <h6 class="fs-6 mt-3">Leave Type :{{$leave_request->leaveType->leave_type ?? ''}}</h6>
                    <h6 class="fs-6 mt-3">Start Date :{{$leave_request->start_date}}</h6>
                    <h6 class="fs-6 mt-3">Duration :{{$leave_request->duration}}</h6>
                </div>
                <div class="mt-4">
                    <form action="{{route('requests.approve' , $leave_request->id)}}" method="post">
                        @csrf
                        @method('put')
                        <x-primary-button type="submit">Accept</x-primary-button>
                    </form>
                    <form action="{{route('requests.deny' , $leave_request->id)}}" method="post" class="">
                        @csrf
                        @method('patch')
                        <x-input-label class="mb-1 fs-6" for="reject_reason" class="mt-2">Write Reject Reason:</x-input-label>
                        <x-text-input type="text" name="reject_reason" id="reject_reason" />
                        <x-danger-button type="submit">Deny</x-danger-button>
                    </form>
                </div>
            </div>
            <hr class="mt-3">
            @empty
            <p class="text-danger text-center">No Leave Request Found!</p>
            @endforelse
        </div>

    </div>

</x-app-layout>