<x-main-layout title="Leave Requests">
    <x-nav id="{{Auth::id()}}" />
    <div class="content-wrapper">
        <div class="container">
        <a href="{{route('leave_request.create')}}" class="btn btn-primary mb-3">Send Leave Request</a>

            <div class="row">
                
            @foreach($leave_requests as $leave_request)
                <div class="col-md-6">
                    <div class="card p-5">
                        <h3 class="text-primary mb-4" style="font-weight: bolder;">
                       Requested By:  {{$leave_request->user->first_name}}  {{$leave_request->user->last_name}}
                        </h3>
                        <div class="body mt-2 mb-2"> 
                            <span style="font-weight: bold; font-size:17px">  Leave Type : </span>{{$leave_request->leave_type->name}}
                            <hr class="text-secondary">
                            <span style="font-weight: bold; font-size:17px">  Reason : </span>{{$leave_request->reason}}
                            <hr class="text-secondary">
                            <span style="font-weight: bold; font-size:17px">Leave Start Date :</span>  {{$leave_request->start_date}}
                            <hr class="text-secondary">
                            <span style="font-weight: bold; font-size:17px"> Leave End Date : </span> {{$leave_request->end_date}}
                            <hr class="text-secondary">
                            <span style="font-weight: bold; font-size:17px"> Current Status : </span>{{$leave_request->status}}

                        </div>
                        <div class="actions d-flex justify-content-between mt-4 me-3">
                        <form action="{{route('leave_request.approve' , $leave_request->id )}}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                            </form>
                            <form action="{{route('leave_request.reject' , $leave_request->id )}}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-outline-warning"><i class="fas fa-ban"></i></button>
                            </form>
                          
                            <form action="{{route('leave_request.destroy',  $leave_request->id)}}" method="post" class="ms-3">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger "><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-main-layout>