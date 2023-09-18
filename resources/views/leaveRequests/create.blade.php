<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-4 fs-2">Create a Leave Request</h2>

        <form action="{{route('requests.store')}}" method="post">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="employee_name" id="employee_name" class="form-control w-75" />
                <label class="mb-1 fs-6" for="employee_name">Your Name :</label>
                <x-input-error :messages="$errors->get('employee_name')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="reason" id="reason" class="form-control w-75" />
                <label class="mb-1 fs-6" for="reason">Write Request Reason :</label>
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <select class="form-control w-75" name="leave_type_id">
                    @foreach($leave_types as $leave_type)
                    <option value="{{$leave_type->id}}" name="leave_type_id">{{$leave_type->leave_type}}</option>
                    @endforeach
                </select>
                <label class="mb-1 fs-6" for="leave_type">Choose leave Type :</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" name="start_date" id="start_date" class="form-control w-75" />
                <label class="mb-1 fs-6" for="start_date">Start Date :</label>
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="duration" id="duration" class="form-control w-75" />
                <label class="mb-1 fs-6" for="duration">Duration :</label>
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
            </div>


            <button type="submit" class="btn btn-primary">Send Request</button>

        </form>
    </div>

</x-main-layout>