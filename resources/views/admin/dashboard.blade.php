<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#1f2122]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#27292a] p-6 rounded-lg shadow-lg mb-6">
                <h3 class="text-2xl font-bold text-white mb-2">
                    {{ __("Welcome to Admin Dashboard") }}
                </h3>
                <p class="text-white opacity-90">Manage your events and artists from here</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Event Management Card -->
                <div class="bg-[#27292a] rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-32 bg-[#323435] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-white mb-3">Event Management</h4>
                        <p class="text-gray-300 mb-6">Create, edit, and manage all events. Control event details, schedules, and ticket information.</p>
                        <a href="{{ route('events.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#ec6090] text-white font-semibold rounded-lg hover:bg-[#3c3e3f] transition-all duration-300 shadow-md hover:shadow-lg">
                            <span>Manage Events</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Artist Management Card -->
                <div class="bg-[#27292a] rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-32 bg-[#323435] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-white mb-3">Artist Management</h4>
                        <p class="text-gray-300 mb-6">Manage artist profiles, performances, and schedules. Update artist information and details.</p>
                        <a href="{{ route('artists.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#ec6090] text-white font-semibold rounded-lg hover:bg-[#3c3e3f] transition-all duration-300 shadow-md hover:shadow-lg">
                            <span>Manage Artists</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
