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
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control form-select" name="status" id="status">
                        <option class="form-option" value="">Select a Status</option>
                        <option class="form-option" value="pending" @if ($log->status == 'pending') selected @endif>Pending</option>
                        <option class="form-option" value="approved" @if ($log->status == 'approved') selected @endif>Approved</option>
                        <option class="form-option" value="rejected" @if ($log->status == 'rejected') selected @endif>Rejected</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="allowed_days" class="col-sm-3 col-form-label">Allowed Days</label>
                <div class="col-sm-9">
                    <input name="allowed_days" id="allowed_days" type="text" class="form-control" value="{{old('allowed_days' , $leave_type->allowed_days)}}" placeholder="dd/mm/yyyy">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="action d-flex justify-content-end">
                <button type="submit" class="btn btn-inverse-primary btn-fw" style="margin-right: 10px;">{{$button}}</button>
                <a href="{{route('user.index' , Auth::id())}}" class="btn btn-inverse-danger btn-fw" style="margin-right: 10px;">Cancel</a>
            </div>
        </div>
    </div>
</div>