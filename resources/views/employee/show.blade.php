<x-app-layout>

    <div class="container p-5 m-auto w-50 mt-5 bg-white">

        <h1 class="text-center fs-1 mb-3">
            {{$employee->name}} Details :
        </h1>

        <h5 class="fs-5 mb-2">Email : {{$employee->email}}</h5>
        <h5 class="fs-5 mb-2">Position : {{$employee->position}}</h5>
        <h5 class="fs-5 mb-2">Phone : {{$employee->phone}}</h5>
        <h5 class="fs-5 mb-2">age : {{$employee->age}}</h5>
    </div>

</x-app-layout>