<x-register title="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="card p-2 col-lg-5 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h3 class="text-center" style="font-weight: bolder;">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label class="form-label" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Role</label>
                        <select class="form-control " name="type" id="type">
                            <option class="form-option" value="">Select a Role</option>
                            <option class="form-option" value="administrator">Administrator</option>
                            <option class="form-option" value="employee">Employee</option>
                        </select>
                </div>
                <!-- Password -->
                <div class="mt-4 form-group">
                    <x-input-label class="form-label" for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <button type="submit" class="btn btn-inverse-primary btn-fw" style="margin-right: 10px;">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-register>