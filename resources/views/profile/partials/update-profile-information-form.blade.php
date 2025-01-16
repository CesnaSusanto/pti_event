<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
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
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        
        <!-- Teks tambahan di atas mailto -->
        <div class="mt-6">
            <p class="text-md text-gray-800 ms-4">
                {{ __('Do you have an event to announce on our website and want to become an admin? Submit your application to become an admin!') }}
            </p>
        </div>

        <!-- Kolom baru untuk mailto -->
        <div class="flex items-center gap-4 ms-4">
            <x-input-label for="mailto" :value="__('Mailto')" />
            <x-text-input id="mailto" name="mailto" type="text" class="mt-1 block w-full" :value="'eventz.pti@gmail.com'" readonly />
            <button type="button" onclick="window.location.href='mailto:eventz.pti@gmail.com?subject=Application to Become Admin&body=Hello, this is '+document.getElementById('name').value+' with email '+document.getElementById('email').value+'. I would like to create an event and upgrade my account to admin so that I can publish an event. Below is a brief overview of the event I am planning to organize.%0D%0AEvent Name : %0D%0ABrief Event Description: %0D%0AContact Reference: %0D%0A%0D%0AAttached %0D%0AEvent Permit or Relevant Certificate: (available/not available)%0D%0A%0D%0Aregards,%0D%0A'+document.getElementById('name').value;" class="ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 4v8m0-8L3 8m18 0l-9 6m0 0v8" />
                </svg>
            </button>
        </div>
    </form>
</section>
