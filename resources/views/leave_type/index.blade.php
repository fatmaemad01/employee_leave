<x-main-layout title="Leave Types">
    <x-nav id="{{Auth::id()}}" />
    <div class="content-wrapper">
        <h3 class="text-success"> </h3>
        <div class="container">
            <div class="row">
                @foreach($leave_types as $leave_type)
                <div class="col-md-4">
                    <div class="card p-5">
                        <h3 class="text-primary " style="font-weight: bolder;">
                            {{$leave_type->name}}
                        </h3>
                        <div class="body mt-2 mb-2">For {{$leave_type->description}}</div>
                        <div class="body mt-2 mb-2">Allowed for {{$leave_type->allowed_days}} days</div>
                        <div class="actions d-flex justify-content-between mt-4 me-3">
                            <a href="{{route('leave_type.edit' , $leave_type->id )}}" class="btn btn-outline-success me-3"><i class="fas fa-edit"></i></a>
                            <form action="{{route('leave_type.destroy',  $leave_type->id)}}" method="post" class="ms-3">
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