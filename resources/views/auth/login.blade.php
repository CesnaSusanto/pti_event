<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold font-poppins text-gray-500 mb-6 text-center">LOGIN</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div >
                    <x-input-label  for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Email') }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        
                        <x-text-input id="password" class=" mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                        
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="flex items-center justify-between mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>
                        
                        <x-btn-auth>
                            {{ __('LOGIN') }}
                        </x-btn-auth>
                        
                    </form>
                    <div class="mt-6 text-center text-sm text-gray-600">
                        Don't have an account? 
                        <a href="/register" class="text-indigo-600 hover:text-indigo-500 font-medium">Regist Here</a>
                    </div>
            </div>
        </div>
    </x-guest-layout>
