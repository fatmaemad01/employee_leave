<x-main-layout title="dashboard">
    <x-nav :id="$user->id" />
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title p-4 text-center">Human Resources</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @if($user->type == 'employee')
                                <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->type}}</td>
                                    <td>{{$user->department}}</td>
                                    <td class="d-flex justify-content-between">
                                        <a href="{{route('user.edit' , $user->id)}}" class="btn btn-inverse-primary btn-fw me-3">Edit</a>
                                        <form action="{{route('user.destroy' , $user->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-inverse-danger btn-fw">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>