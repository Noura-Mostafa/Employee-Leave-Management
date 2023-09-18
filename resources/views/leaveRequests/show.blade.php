<x-main-layout>

    <div class="container pt-5 w-50 m-auto">
        <h3 class="text-center fs-3 ">Your Request Details</h3>
        <div class="mt-3 p-3 border">
            <h5 class="fs-5 mt-2">Reason : {{$leave_request->reason}}</h5>
            <h5 class="fs-5 mt-2">Status : {{$leave_request->status}}</h5>
            <h5 class="fs-5 mt-2">Start Date : {{$leave_request->start_date}}</h5>
            <h5 class="fs-5 mt-2">Duration : {{$leave_request->duration}}</h5>
        </div>

        <div class="mt-3 p-3 border">
            <h5 class="fs-5 mt-2">Reject Reason (if reject) : {{$leave_request->reject_reason}}</h5>
        </div>

        <form action="{{route('requests.destroy' , $leave_request->id)}}" method="post" class="mt-3 p-3 w-25 m-auto">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

</x-main-layout>