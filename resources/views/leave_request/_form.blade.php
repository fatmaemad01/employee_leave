<div class="card p-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{old('start_date' , $leave_request->start_date)}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-9">
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{old('end_date' , $leave_request->end_date)}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="reason" class="col-sm-3 col-form-label">Reason</label>
                <div class="col-sm-9">
                    <input name="reason" id="reason" type="text" class="form-control" value="{{old('reason' , $leave_request->reason)}}">
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control form-select" name="status" id="status">
                        <option class="form-option" value="">Select a Status</option>
                        <option class="form-option" value="pending" @if ($leave_request->status == 'pending') selected @endif>Pending</option>
                        <option class="form-option" value="approved" @if ($leave_request->status == 'approved') selected @endif>Approved</option>
                        <option class="form-option" value="rejected" @if ($leave_request->status == 'rejected') selected @endif>Rejected</option>
                    </select>
                </div>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="form-group row">
                <label for="leave_type_id" class="col-sm-3 col-form-label">Leave Type</label>
                <div class="col-sm-9">
                    <select class="form-select form-control" name="leave_type_id" id="leave_type_id">
                        <option value="">Select Leave Type</option>
                        @foreach($leave_types as $leave_type)
                        <option class="form-option" value="{{$leave_type->id}}" @if ($leave_type->id == old('leave_type_id' , $leave_request->leave_type_id)) selected @endif>{{$leave_type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="action d-flex justify-content-end">
                <button type="submit" class="btn btn-inverse-primary btn-fw" style="margin-right: 10px;">{{$button}}</button>
                <a   @if(Auth::user()->type == 'administrator')
                href="{{ route('user.home.admin' , Auth::id())}}"
                @elseif(Auth::user()->type == 'employee')
                href="{{ route('user.employee' , Auth::id())}}"
                @endif
                 class="btn btn-inverse-danger btn-fw" style="margin-right: 10px;">Cancel</a>
            </div>
        </div>
    </div>
</div>