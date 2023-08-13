<x-main-layout title="Register">
    <div class="container-scroller">
        <div class="row  w-100 mx-0">
            <div class="card p-2 col-lg-11 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h3 class="text-center" style="font-weight: bolder;">Add New Employee</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="first_name" id="first_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="last_name" id="last_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="birthday" class="col-sm-3 col-form-label">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input name="birthday" id="birthday" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-3 col-form-label">Role</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select" name="type" id="type">
                                                <option class="form-option" value="">Select a Role</option>
                                                <option class="form-option" value="administrator">Administrator</option>
                                                <option class="form-option" value="employee">Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="job_title" class="col-sm-3 col-form-label">Job</label>
                                        <div class="col-sm-9">
                                            <input name="job_title" id="job_title" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <input name="department" id="department" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input name="phone" id="phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input name="email" id="email" type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <x-input-label class="col-sm-3 col-form-label" for="password" :value="__('Password')" />
                                        <div class="col-sm-9">
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <x-input-label class="col-sm-3 col-form-label" for="password_confirmation" :value="__('Confirm Password')" />
                                        <div class="col-sm-9">
                                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="action d-flex justify-content-end">
                                        <button type="submit" class="btn btn-inverse-primary btn-fw" style="margin-right: 10px;">Register</button>
                                        <a href="{{route('user.home.admin' , Auth::id())}}" class="btn btn-inverse-danger btn-fw" style="margin-right: 10px;">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>