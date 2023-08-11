<x-main-layout title="Create">
    <x-nav id="{{Auth::id()}}" />
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card m-5 p-3">
                <x-errors />

                <h3 style="text-align:center; margin-top:20px">New Leave Type</h3>
                <form action="{{route('leave_type.store')}}" method="post">
                    @csrf
                    @include ('leave_type._form' , [
                    'button' => 'Create'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-main-layout>