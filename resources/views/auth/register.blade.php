<x-guest-layout>
    <div class="w-full h-screen flex flex-row items-center justify-center">
        <form method="POST" action="{{ route('register') }}" class="px-8 rounded-2xl py-12 bg-[#27292a] flex flex-col gap-8 w-full max-w-[400px]">
            @csrf
            <div class="w-full flex flex-row items-center justify-center  py-8 ">
                <h1 class="font-medium text-2xl text-white ">REGISTER</h1>
            </div>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-4 items-center justify-end mt-4">
                <x-primary-button class="w-full justify-center py-4">
                    {{ __('Register') }}
                </x-primary-button>
                <div class="mt-6 text-center text-sm text-stone-300">
                        Already have an account ? 
                        <a href="{{ route('login') }}" class="text-pink-400 hover:text-pink-300 font-medium">Login Here</a>
                    </div>

            </div>
        </form>
    </div>
</x-guest-layout>
