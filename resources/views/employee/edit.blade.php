<x-app-layout>

    <div class="container p-5 mt-5 bg-white w-50 m-auto">

        <form action="{{route('employees.update' , $employee->id)}}" method="post">
            @csrf
            @method('put')

            <h2 class="mb-3 fs-2 text-center">Edit {{$employee->name}}</h2>


            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="name">Name :</x-input-label>
                <x-text-input class="w-100"  type="text" name="name" id="name" value="{{$employee->name}}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="position">Position :</x-input-label>
                <x-text-input class="w-100" type="text" name="position" id="position" value="{{$employee->position}}" />
                <x-input-error :messages="$errors->get('position')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="age">Age :</x-input-label>
                <x-text-input class="w-100" type="number" name="age" id="age" value="{{$employee->age}}" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="phone">Phone :</x-input-label>
                <x-text-input class="w-100" type="text" name="phone" id="phone" value="{{$employee->phone}}" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>


            <x-primary-button type="submit" class="mt-2">Update Employee</x-primary-button>

        </form>


    </div>

</x-app-layout>