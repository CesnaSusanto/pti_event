<section class="p-4 sm:p-8 bg-[#27292a] shadow rounded-lg">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name" name="name" type="text" 
                class="mt-1 block w-full rounded-lg bg-[#27292a] border border-gray-600 text-white focus:border-[#ec6090] focus:ring-[#ec6090]" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" name="email" type="email" 
                class="mt-1 block w-full rounded-lg bg-[#27292a] border border-gray-600 text-white focus:border-[#ec6090] focus:ring-[#ec6090]" 
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" 
                            class="underline text-sm text-gray-400 hover:text-[#ec6090] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ec6090]">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-[#ec6090]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-[#ec6090] hover:bg-[#d4517c] transition duration-300 ease-in-out">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        
        <!-- Teks tambahan di atas mailto -->
        <div class="mt-6">
            <p class="text-md text-gray-300">
                {{ __('Do you have an event to announce on our website and want to become an admin? Submit your application to become an admin!') }}
            </p>
        </div>

        <!-- Kolom baru untuk mailto -->
        <div class="flex items-center gap-4 mt-4">
            <x-input-label for="mailto" :value="__('Mailto')" class="text-gray-300" />
            <div class="relative flex-1">
                <x-text-input id="mailto" name="mailto" type="text" 
                    class="mt-1 block w-full rounded-lg bg-[#27292a] border border-gray-600 text-white" 
                    :value="'eventz.pti@gmail.com'" readonly />
                <button type="button" 
                    onclick="window.location.href='mailto:eventz.pti@gmail.com?subject=Application to Become Admin&body=Hello, this is '+document.getElementById('name').value+' with email '+document.getElementById('email').value+'. I would like to create an event and upgrade my account to admin so that I can publish an event. Below is a brief overview of the event I am planning to organize.%0D%0AEvent Name : %0D%0ABrief Event Description: %0D%0AContact Reference: %0D%0A%0D%0AAttached %0D%0AEvent Permit or Relevant Certificate: (available/not available)%0D%0A%0D%0Aregards,%0D%0A'+document.getElementById('name').value;" 
                    class="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-gray-400 hover:text-[#ec6090] transition-colors duration-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 4v8m0-8L3 8m18 0l-9 6m0 0v8" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</section>
