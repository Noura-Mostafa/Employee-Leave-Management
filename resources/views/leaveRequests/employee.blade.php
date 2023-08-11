<x-app-layout>

    <div class="container p-5">

        <div class="tools text-center">
            <a href="{{route('requests.create')}}" class="btn btn-primary">+ Leave Requests</a>
        </div>

        <div class="bg-white p-4 mt-3">
            <h2 class="fs-2">Your Leave requests Status</h2>
            @forelse($leave_requests as $request)
            <div class="type mt-3 d-flex justify-content-between">
                <div class="">
                    <h4 class="ps-4 fs-4">Status : <span class="btn btn-primary">{{$request->status}}</span></h4>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('requests.show' , $request->id)}}" class="btn btn-primary btn-sm me-1">Show</a>
                    <form action="{{route('requests.destroy' , $request->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger btn-sm" type="submit">delete</button>
                    </form>
                </div>
            </div>
            <hr class="mt-3">
            @empty
            <p class="text-center text-danger">No leave requests yet!</p>
            @endforelse
        </div>

    </div>

</x-app-layout>