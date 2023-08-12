<x-app-layout>

    <div class="container p-5 mt-5 bg-white">

        <form action="{{route('employees.store')}}" method="post">
            @csrf

            <h2 class="mb-3 fs-2">Add an employee</h2>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="name">Name :</x-input-label>
                        <x-text-input class="w-75" type="text" name="name" id="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="email">Email :</x-input-label>
                        <x-text-input class="w-75" type="email" name="email" id="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="password">Password :</x-input-label>
                        <x-text-input class="w-75" type="password" name="password" id="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="position">Position :</x-input-label>
                        <x-text-input class="w-75" type="text" name="position" id="position" />
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="age">Age :</x-input-label>
                        <x-text-input class="w-75" type="number" name="age" id="age" />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <div class="form-input mb-2">
                        <x-input-label class="mb-1 fs-6" for="phone">Phone :</x-input-label>
                        <x-text-input class="w-75" type="text" name="phone" id="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>
            </div>

            <x-primary-button type="submit" class="mt-2">Add Employee</x-primary-button>

        </form>


    </div>

</x-app-layout>