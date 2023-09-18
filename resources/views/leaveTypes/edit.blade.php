<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-3 fs-2">Edit {{$leave_type->leave_type}}</h2>

        <form action="{{route('leave-types.update' , $leave_type->id)}}" method="post" class="mt-5">
            @csrf
            @method('put')
                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="text" name="leave_type" id="leave_type" value="{{$leave_type->leave_type}}"/>
                        <label class="mb-1 fs-6" for="leave_type">Name of leave type:</label>
                        <x-input-error :messages="$errors->get('leave_type')" class="mt-2" />
                    </div>

                    <div class="form-floating mb-2">
                        <input class="form-control w-75" type="text" name="description" id="description" value="{{$leave_type->description}}"/>
                        <label class="mb-1 fs-6" for="leave_type">Description:</label>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

            <button type="submit" class="btn btn-primary mt-4">Update</button>

        </form>
    </div>

</x-main-layout>