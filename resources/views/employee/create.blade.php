<x-main-layout>

    <div class="container pt-5">

    <h2 class="mb-5 fs-2">Add an employee</h2>

        <form action="{{route('employees.store')}}" method="post">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="text" name="name" id="name" />
                        <label class="mb-1 fs-6" for="name">Name :</label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="email" name="email" id="email" />
                        <label class="mb-1 fs-6" for="email">Email :</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="password" name="password" id="password" />
                        <label class="mb-1 fs-6" for="password">Password :</label>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="text" name="position" id="position" />
                        <label class="mb-1 fs-6" for="position">Position :</label>
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="number" name="age" id="age" />
                        <label class="mb-1 fs-6" for="age">Age :</label>
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control w-75" type="text" name="phone" id="phone" />
                        <label class="mb-1 fs-6" for="phone">Phone :</label>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Employee</button>

        </form>


    </div>

</x-main-layout>