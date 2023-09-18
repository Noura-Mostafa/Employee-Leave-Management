<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-5 fs-2">Create Leave Type</h2>


        <form action="{{route('leave-types.store')}}" method="post">
            @csrf

            <div class="form-floating mb-3">
                <input class="form-control w-75" type="text" name="leave_type" id="leave_type" />
                <label class="mb-1 fs-6" for="leave_type">Name of leave type:</label>
                <x-input-error :messages="$errors->get('leave_type')" class="mt-2" />
            </div>

            <div class="form-floating mb-2">
                <input class="form-control w-75" type="text" name="description" id="description" />
                <label class="mb-1 fs-6" for="description">Description :</label>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create Leave Type</button>

        </form>
    </div>

</x-main-layout>