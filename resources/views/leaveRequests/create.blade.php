<x-app-layout>

    <div class="container p-5 mt-5 bg-white w-50 m-auto">

        <form action="{{route('requests.store')}}" method="post">
            @csrf

            <h2 class="mb-4 fs-2 text-center">Create a Leave Request</h2>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="employee_name">Your Name :</x-input-label>
                <x-text-input type="text" name="employee_name" id="employee_name" class="w-100" />
                <x-input-error :messages="$errors->get('employee_name')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="reason">Write Request Reason :</x-input-label>
                <x-text-input type="text" name="reason" id="reason" class="w-100" />
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="leave_type">Choose leave Type :</x-input-label>
                <select class="w-100" name="leave_type_id">
                    @foreach($leave_types as $leave_type)
                    <option value="{{$leave_type->id}}" name="leave_type_id">{{$leave_type->leave_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="start_date">Start Date :</x-input-label>
                <x-text-input type="date" name="start_date" id="start_date" class="w-100" />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="duration">Duration :</x-input-label>
                <x-text-input type="number" name="duration" id="duration" class="w-100" />
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
            </div>


            <x-primary-button type="submit">Send Request</x-primary-button>

        </form>
    </div>

</x-app-layout>