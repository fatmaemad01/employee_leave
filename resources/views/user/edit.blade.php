<x-main-layout title="Update">
   
            <div class="card p-3">
                <x-errors />

                <h3 style="text-align:center; margin-top:20px" >Update {{$user->first_name}} </h3>
                <form action="{{route('user.update' , $user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    @include ('user._form' , [
                    'button' => 'Update'
                    ])
                </form>
        
    </div>
</x-main-layout>