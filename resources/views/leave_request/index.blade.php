<x-main-layout title="Leave Requests">
    <div class="row">
        @foreach($leave_requests as $leave_request)
        <div class="col-md-6">
            <div class="card p-5">
                <h3 class="text-dark mb-4" style="font-weight: bolder;">
                    Requested By: {{$leave_request->user->first_name}} {{$leave_request->user->last_name}}
                </h3>
                <div class="body mt-2 mb-2">
                    <span style="font-weight: bold; font-size:17px"> Leave Type : </span>{{$leave_request->leave_type->name}}
                    <hr class="text-secondary">
                    <span style="font-weight: bold; font-size:17px"> Reason : </span>{{$leave_request->reason}}
                    <hr class="text-secondary">
                    <span style="font-weight: bold; font-size:17px">Leave Start Date :</span> {{$leave_request->start_date}}
                    <hr class="text-secondary">
                    <span style="font-weight: bold; font-size:17px"> Duration : </span> {{$leave_request->duration}} days
                    <hr class="text-secondary">
                    <span style="font-weight: bold; font-size:17px"> Allowed Days : </span> {{$leave_request->leave_type->allowed_days}} 
                    <hr class="text-secondary">
                    <span style="font-weight: bold; font-size:17px"> Current Status : </span>{{$leave_request->status}}

                </div>
                <div class="actions d-flex justify-content-between mt-4 me-3">
                    <form action="{{route('leave_request.approve' , $leave_request->id )}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-success"><i class="fas fa-check text-white"></i></button>
                    </form>
                    <form action="{{route('leave_request.reject' , $leave_request->id )}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-warning"><i class="fas fa-ban text-white"></i></button>
                    </form>

                    <form action="{{route('leave_request.destroy',  $leave_request->id)}}" method="post" class="ms-3">
                        @csrf
                        @method('delete')
                        <button type="submit" class=" btn btn-danger "><i class="fas fa-trash text-white"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</x-main-layout>