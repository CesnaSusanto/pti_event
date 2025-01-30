<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="min-h-screen bg-[#27292a] py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-pink-400 space-y-6 ">
            <div class="py-12 px-8 bg-[#1f2122] shadow sm:rounded-lg text-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="py-12 px-8 bg-[#1f2122] shadow sm:rounded-lg text-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="py-12 px-8 bg-[#1f2122] shadow sm:rounded-lg text-white">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
