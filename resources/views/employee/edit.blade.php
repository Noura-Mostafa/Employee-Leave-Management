<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-5 fs-2">Edit Employee</h2>

        <form action="{{route('employees.update' , $employee->id)}}" method="post">
            @csrf
            @method('put')

            <div class="form-floating mb-3">
                <input class="form-control w-50"  type="text" name="name" id="name" value="{{$employee->name}}" />
                <label class="mb-1 fs-6" for="name">Name :</label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <input class="form-control w-50" type="text" name="position" id="position" value="{{$employee->position}}" />
                <label class="mb-1 fs-6" for="position">Position :</label>
                <x-input-error :messages="$errors->get('position')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <input class="form-control w-50" type="number" name="age" id="age" value="{{$employee->age}}" />
                <label class="mb-1 fs-6" for="age">Age :</label>
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <input class="form-control w-50" type="text" name="phone" id="phone" value="{{$employee->phone}}" />
                <label class="mb-1 fs-6" for="phone">Phone :</label>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>


            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>

        </form>


    </div>

</x-main-layout>