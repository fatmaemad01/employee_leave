<x-main-layout title="Leave Types">


    <div class="card">
        <div class="card-body">
            <h3 class="card-title p-4 text-center">Leave Approval Logs</h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Approver</th>
                            <th>Request by</th>
                            <th>Comment</th>
                            <th>Approved At</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($approval_logs as $approval_log)
                        <tr>
                            <td> {{$approval_log->user?->first_name}} {{$approval_log->user?->last_name}}</td>
                            <td>{{$approval_log->leave_request->user->first_name}} {{$approval_log->leave_request->user->last_name}}</td>
                            <td>{{$approval_log->comment}}</td>
                            <td>{{$approval_log->created_at->format('F j , Y')}}</td>
                            @if($approval_log->status == 'pending')
                            <td><label class="badge rounded-pill bg-warning text-white ">pending</label></td>
                            @elseif($approval_log->status == 'rejected')
                            <td><label class="badge rounded-pill bg-danger text-white ">Rejected</label></td>
                            @elseif($approval_log->status == 'approved')
                            <td><label class="badge rounded-pill bg-success text-white ">Approved</label></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-main-layout>
