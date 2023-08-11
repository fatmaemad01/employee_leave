<nav class="sidebar sidebar-offcanvas" id="sidebar" style="width: 300px;">
    <img class=" mt-3 " src="{{asset('img/logo.png')}}" style="margin-left: 15px; " alt="" height="60px" width="220px">

    <ul class="nav" style="margin-top:0px">
        <li class="nav-item">

            <a class="nav-link" 
            @if(Auth::user()->type == 'administrator')
                href="{{ route('user.home.admin' , Auth::id())}}"
                @elseif(Auth::user()->type == 'employee')
                href="{{ route('user.employee' , Auth::id())}}"
                @endif>
                <i class="fas fa-address-book menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{route('register')}}" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-registered menu-icon"></i>
                <span class="menu-title">Register Person</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{route('leave_type.create')}}" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-plus menu-icon"></i>
                <span class="menu-title">Add Leave Type</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{route('leave_type.index')}}" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-eye menu-icon"></i>
                <span class="menu-title">Leave Types</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{route('leave_request.index')}}" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-bell menu-icon"></i>
                <span class="menu-title">Leave Request</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{route('log.index')}}" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-file menu-icon"></i>
                <span class="menu-title">Leave Logs</span>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn" style="margin: 0; padding:0">

                    <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="auth">
                        <i class="fas fa-sign-out-alt menu-icon"></i>
                        <span class="menu-title">Logout</span> </a>

                </button>
            </form>
        </li>

    </ul>
</nav>