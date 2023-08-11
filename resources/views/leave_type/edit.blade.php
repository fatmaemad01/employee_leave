<x-main-layout title="Update">
    <x-nav id="{{Auth::id()}}" />
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card m-5 p-3">
                <x-errors />

                <h3 style="text-align:center; margin-top:20px" >Update # {{$leave_type->id}} </h3>
                <form action="{{route('leave_type.update' , $leave_type->id)}}" method="post">
                    @csrf
                    @method('patch')
                    @include ('leave_type._form' , [
                    'button' => 'Update'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-main-layout>