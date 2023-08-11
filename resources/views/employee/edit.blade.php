<x-app-layout>

    <div class="container p-5 mt-5 bg-white">

        <form action="{{route('employees.update' , $employee->id)}}" method="post">
            @csrf
            @method('put')

            <h2 class="mb-3 fs-2">Edit {{$employee->name}}</h2>

            <div class="d-flex">
                <div class="col">
                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="name">Name :</x-input-label>
                        <x-text-input class="w-75" type="text" name="name" id="name" value="{{$employee->name}}"/>
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="email">Email :</x-input-label>
                        <x-text-input class="w-75" type="email" name="email" id="email" value="{{$employee->email}}"/>
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="phone">Phone :</x-input-label>
                        <x-text-input class="w-75" type="text" name="phone" id="phone" value="{{$employee->phone}}"/>
                    </div>
                </div>


                <div class="col">
                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="position">Position :</x-input-label>
                        <x-text-input class="w-75" type="text" name="position" id="position" value="{{$employee->position}}"/>
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="age">Age :</x-input-label>
                        <x-text-input class="w-75" type="number" name="age" id="age" value="{{$employee->age}}"/>
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="salary">Salary :</x-input-label>
                        <x-text-input class="w-75" type="text" name="salary" id="salary" value="{{$employee->salary}}"/>
                    </div>
                </div>

            </div>

            <x-primary-button type="submit">Update Employee</x-primary-button>

        </form>


    </div>

</x-app-layout>