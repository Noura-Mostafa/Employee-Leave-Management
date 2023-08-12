<x-app-layout>

    <div class="container p-5">

        <div class="tools text-center">
            <a href="{{route('employees.create')}}" class="btn btn-primary">+ Add Employee</a>
            <a href="{{route('leave-types.create')}}" class="btn btn-primary">+ Add Leave Type</a>
            <a href="{{route('requests.index')}}" class="btn btn-primary"> Leave Requests</a>
        </div>

        <table class="table border mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">age</th>
                    <th scope="col">position</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->age}}</td>
                    <td>{{$employee->position}}</td>
                    <td class="d-flex">
                        <a href="{{route('employees.show' , $employee->id)}}" class="btn btn-primary btn-sm me-1">show</a>
                        <a href="{{route('employees.edit' , $employee->id)}}" class="btn btn-outline-dark btn-sm me-1">edit</a>
                        <form action="{{route('employees.destroy' , $employee->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p class="text-danger">No Employees Found!</p>
                @endforelse
            </tbody>
        </table>

        <div class="leave-types bg-white p-4">
            <h4 class="fs-4">Leave Types</h4>
            @forelse($leave_types as $type)
            <div class="type mt-3 d-flex justify-content-between">
                <div class="">
                    <h5 class="ps-4 fs-5">{{$type->leave_type}}</h5>
                    <p class="text-secondary ps-4">{{$type->description}}</p>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('leave-types.edit' , $type->id)}}" class="btn btn-outline-dark btn-sm me-1">edit</a>
                    <form action="{{route('leave-types.destroy' , $type->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger btn-sm" type="submit">delete</button>
                    </form>
                </div>

            </div>
            @empty
            <p class="text-danger text-center">No Leave Type Added!</p>
            @endforelse
        </div>

    </div>

</x-app-layout>