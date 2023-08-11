<x-app-layout>

    <div class="container p-5 mt-5 bg-white">

        <form action="{{route('leave-types.update' , $leave_type->id)}}" method="post">
            @csrf
            @method('put')


            <h2 class="mb-3 fs-2">Edit {{$leave_type->leave_type}}</h2>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="leave-type">Name of leave type:</x-input-label>
                        <x-text-input class="w-75" type="text" name="leave_type" id="leave_type" value="{{$leave_type->leave_type}}"/>
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="description">Description :</x-input-label>
                        <x-text-input class="w-75" type="text" name="description" id="description" value="{{$leave_type->description}}"/>
                    </div>

            <x-primary-button type="submit" class="mt-2">Update</x-primary-button>

        </form>
    </div>

</x-app-layout>