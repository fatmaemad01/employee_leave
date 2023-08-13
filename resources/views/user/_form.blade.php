<div class="card p-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{old('first_name' , $user->first_name)}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{old('last_name' , $user->last_name)}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="birthday" class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-9">
                    <input name="birthday" id="birthday" type="date" class="form-control" value="{{old('birthday' , $user->birthday)}}" placeholder="dd/mm/yyyy">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="type" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-control form-select" name="type" id="type">
                        <option class="form-option" value="">Select a Role</option>
                        <option class="form-option" value="administrator" @if ($user->type == 'administrator') selected @endif>Administrator</option>
                        <option class="form-option" value="employee" @if ($user->type == 'employee') selected @endif>Employee</option>
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
                    <input name="job_title" id="job_title" value="{{old('job_title' , $user->job_title)}}" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Department</label>
                <div class="col-sm-9">
                    <input name="department" id="department" value="{{old('department' , $user->department)}}" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input name="phone" id="phone" type="text" value="{{old('phone' , $user->phone)}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="action d-flex justify-content-end">
                <button type="submit" class="btn btn-inverse-primary btn-fw" style="margin-right: 10px;">{{$button}}</button>
                <a href="{{route('user.home.admin' , Auth::id())}}" class="btn btn-inverse-danger btn-fw" style="margin-right: 10px;">Cancel</a>
            </div>

        </div>
    </div>
   
</div>