<div class="card p-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name' , $leave_type->name)}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <input type="text" name="description" id="description" class="form-control" value="{{old('description' , $leave_type->description)}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="allowed_days" class="col-sm-3 col-form-label">Allowed Days</label>
                <div class="col-sm-9">
                    <input name="allowed_days" id="allowed_days" type="text" class="form-control" value="{{old('allowed_days' , $leave_type->allowed_days)}}" placeholder="8 day">
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