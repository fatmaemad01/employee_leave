<x-main-layout title="Leave Types">
        <h3 class="text-success"> </h3>
        <div class="container">
            <div class="row">
                @foreach($leave_requests as $leave_request)
                <div class="col-md-6">
                    <div class="card p-5 mb-5">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <h3 class="text-dark text-center mt-3 mb-4" style="font-weight: bold;">{{$leave_request->user->first_name}} {{$leave_request->user->last_name}} Request</h3>

                                <tr>
                                    <th>Leave Type </th>
                                    <td>{{$leave_request->leave_type->name}}</td>
                                </tr>
                                <tr>
                                    <th>Start Date </th>
                                    <td>{{$leave_request->start_date}}</td>
                                </tr>
                                <tr>
                                    <th>Duration </th>
                                    <td>{{$leave_request->duration}}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Allowed Days</th>
                                    <td>
                                        @if($leave_request->status =='approved' && $leave_request->duration > $leave_request->leave_type->allowed_days )
                                        {{$leave_request->leave_type->allowed_days}}</td>
                                        @elseif($leave_request->status =='approved' && $leave_request->duration <= $leave_request->leave_type->allowed_days)
                                        {{$leave_request->duration}}
                                        @endif
                                </tr> --}}
                                <tr>
                                    <th>Request Status </th>
                                    @if($leave_request->status == 'pending')
                                    <td><label class="badge rounded-pill bg-warning text-white p-2 ">pending</label></td>
                                    @elseif($leave_request->status == 'rejected')
                                    <td><label class="badge rounded-pill bg-danger text-white p-2 ">Rejected</label></td>
                                    @elseif($leave_request->status == 'approved')
                                    <td><label class="badge rounded-pill bg-success text-white p-2">Approved</label></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Response Date</th>
                                    <td>{{$leave_request->logs->last()?->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>Approver Comment </th>
                                    <td>{{$leave_request->logs->last()?->comment}}</td>
                                </tr>
                                <tr>
                                    <th>Approver Name </th>
                                    <td>{{$leave_request->approver?->first_name}} {{$leave_request->approver?->last_name}}</td>
                                </tr>
                        </div>

                        </table>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</x-main-layout>
