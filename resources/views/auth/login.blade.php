<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" w-full h-screen flex flex-row items-center justify-center">
        <form method="POST" action="{{ route('login') }}" class="px-8 rounded-2xl py-12 bg-[#27292a] flex flex-col gap-8 w-full max-w-[400px]">
            @csrf

            <div class="w-full flex flex-row items-center justify-center  py-8 ">
                <h1 class="font-medium text-2xl text-white ">LOGIN</h1>
            </div>
    
            <div class="flex flex-col gap-1">
                    <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-400 shadow-sm focus:ring-transparent" name="remember">
                        <span class="ms-2 text-sm text-stone-300">{{ __('Remember me') }}</span>
                    </label>
                </div>
        
                <div class="flex flex-col gap-4 items-center justify-end mt-6">
                    <x-primary-button class="w-full items-center justify-center py-4 ">
                        {{ __('Login') }}
                    </x-primary-button>
                    <a href="/" class="text-stone-300 hover:text-pink-400 uppercase">cancel</a>
                    
                    
                </div>
            </div>
            <div class="flex flex-col gap-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-stone-300 text-center hover:text-pink-400 rounded-md focus:outline-none focus:ring-none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div class="text-center text-sm text-stone-300">
                    Don't have an account? 
                    <a href="/register" class="text-pink-400 hover:text-pink-300 font-medium">Regist Here</a>
                </div>
            </div>
        </form>
        
    </div>
</x-guest-layout>
