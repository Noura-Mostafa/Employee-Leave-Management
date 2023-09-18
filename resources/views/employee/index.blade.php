<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-5 fs-2">Employees</h2>

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
                        <a href="{{route('employees.edit' , $employee->id)}}" class="btn btn-dark btn-sm me-1">edit</a>
                        <form action="{{route('employees.destroy' , $employee->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p class="text-danger">No Employees Found!</p>
                @endforelse
            </tbody>
        </table>

    </div>

</x-main-layout>