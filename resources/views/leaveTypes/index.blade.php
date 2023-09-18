<x-main-layout>
<div class="container pt-5">

    <div class="leave-types p-4">
        <h4 class="fs-4">Leave Types</h4>
        @forelse($leave_types as $type)
        <div class="type mt-5 d-flex justify-content-between">
            <div>
                <h5 class="ps-4 fs-5">{{$type->leave_type}}</h5>
                <p class="text-secondary ps-4">{{$type->description}}</p>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{route('leave-types.edit' , $type->id)}}" class="btn btn-dark btn-sm me-1">edit</a>
                <form action="{{route('leave-types.destroy' , $type->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">delete</button>
                </form>
            </div>
        </div>
        <hr />
        @empty
        <p class="text-danger text-center">No Leave Type Added!</p>
        @endforelse
    </div>
</div>
</x-main-layout>