<x-app-layout>

    <div class="container p-5 mt-5 bg-white">


        <form action="{{route('leave-types.store')}}" method="post">
            @csrf

            <h2 class="mb-3 fs-2">Create Leave Type</h2>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="leave_type">Name of leave type:</x-input-label>
                <x-text-input class="w-75" type="text" name="leave_type" id="leave_type" />
                <x-input-error :messages="$errors->get('leave_type')" class="mt-2" />
            </div>

            <div class="form-input mb-2">
                <x-input-label class="mb-1 fs-6" for="description">Description :</x-input-label>
                <x-text-input class="w-75" type="text" name="description" id="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button type="submit" class="mt-2">Create Leave Type</x-primary-button>

        </form>
    </div>

</x-app-layout>