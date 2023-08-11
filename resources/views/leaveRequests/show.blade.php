<x-app-layout>

    <div class="container p-5 mt-5 w-50 m-auto">
        <h3 class="text-center fs-3 ">Your Request Details</h3>
        <div class="mt-3 bg-white p-3">
            <h5 class="fs-5 mt-2">Reason : {{$leave_request->reason}}</h5>
            <h5 class="fs-5 mt-2">Status : {{$leave_request->status}}</h5>
        </div>

        <div class="mt-3 bg-white p-3">
            <h5 class="fs-5 mt-2">Reject Reason (if reject) : {{$leave_request->reject_reason}}</h5>
        </div>

        <form action="{{route('requests.destroy' , $leave_request->id)}}" method="post" class="mt-3 p-3 w-25 m-auto">
            @csrf
            @method('delete')
            <x-danger-button type="submit">Delete</x-danger-button>
        </form>
    </div>

    </div>

</x-app-layout>