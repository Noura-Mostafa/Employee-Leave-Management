<x-app-layout>

    <div class="container p-5 mt-5 bg-white">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{route('requests.store')}}" method="post">
            @csrf

            <h2 class="mb-4 fs-2 text-center">Create a Leave Request</h2>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="employee_name">Your Name :</x-input-label>
                <x-text-input type="text" name="employee_name" id="employee_name" class="w-100" />

                {{--<select name="employee_id" class="w-100">
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>--}}

            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="reason">Write Request Reason :</x-input-label>
                <x-text-input type="text" name="reason" id="reason" class="w-100" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="leave_type">Choose leave Type :</x-input-label>
                <select class="w-100" name="leave_type_id">
                    @foreach($leave_types as $leave_type)
                    <option value="{{$leave_type->id}}" name="leave_type_id">{{$leave_type->leave_type}}</option>
                    @endforeach
                </select>
            </div>


            <x-primary-button type="submit" class="mt-2">Send</x-primary-button>

        </form>
    </div>

</x-app-layout>