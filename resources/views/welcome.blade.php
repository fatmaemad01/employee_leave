<div class="row" style="height: 100%;">
    <x-register title="Welcome">
        <!-- Session Status -->
        <div class="col-6 ">
            <div class="card my-4 col-lg-8 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <img src="{{asset('img/logo.png')}}" style="margin-left: 60px;" alt="" height="90px" class="mt-5">

                    @if(Auth::id() && Auth::user()->type == 'administrator')
                    <div class="card content-wrapper mt-5 p-5">
                        <h3 class="text-center mb-4">Welcome {{Auth::user()->first_name}} </h3>
                        <h4 class="text-secondary text-center">You Are Already Logged In!</h4>
                        <a href="{{route('user.home.admin', Auth::id())}}" class="btn btn-inverse-primary my-4">View Dashboard ?</a>
                    </div>
                    @elseif(Auth::id() && Auth::user()->type == 'employee')
                    <div class="card content-wrapper mt-5 p-5">
                        <h3 class="text-center mb-4">Welcome {{Auth::user()->first_name}} </h3>
                        <h4 class="text-secondary text-center">You Are Already Logged In!</h4>
                        <a href="{{route('user.employee', Auth::id())}}" class="btn btn-inverse-primary my-4">View Dashboard ?</a>
                    </div>
                    @else
                    <div class="card p-5 mt-5">
                        <a href="{{route('login')}}" class="btn btn-inverse-primary">Login ?</a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-6" style=" background-image: url('img/back2.png');">

        </div>

    </x-register>
</div>