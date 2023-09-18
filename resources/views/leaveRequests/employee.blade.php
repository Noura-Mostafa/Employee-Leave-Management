<x-main-layout>

    <div class="container pt-5">


        <div class="d-flex justify-content-between">
            <h2>Your Leave requests Status</h2>
            <a href="{{route('requests.create')}}" class="btn btn-primary">+ Leave Requests</a>
        </div>

        <div class="p-4 mt-3">
            @forelse($leave_requests as $request)
            <div class="type mt-3 d-flex justify-content-between">
                <div class="">
                    <h5 class="ps-4">Start Date : <span class="text-muted">{{$request->start_date}}</span></h5>
                    <h5 class="ps-4">Leave Reason : <span class="text-muted">{{$request->reason}}</span></h5>
                    <h5 class="ps-4">Status : <span class="text-muted">{{$request->status}}</span></h5>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('requests.show' , $request->id)}}" class="btn btn-primary btn-sm me-1">Show</a>
                    <form action="{{route('requests.destroy' , $request->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">delete</button>
                    </form>
                </div>
            </div>
            <hr class="mt-3">
            @empty
            <p class="text-center text-danger">No leave requests yet!</p>
            @endforelse
        </div>

    </div>

</x-main-layout>