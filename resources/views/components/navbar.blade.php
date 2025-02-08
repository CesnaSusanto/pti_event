<nav class="bg-[#1f2122] w-full h-32 px-8 sticky z-10 top-0 flex flex-row items-center justify-center">
    <div class="h-full w-[95%] max-w-[1400px] flex flex-row justify-between items-center">
        <img src="assets/images/logo.png" alt="logo" srcset="" class="h-full object-contain">
        <div class="flex gap-6 items-center text-[#9e9e9e] capitalize">
                @if (Route::has('login'))
                                @auth
                                    <a class="capitalize"
                                        href="{{ url('/dashboard') }}">
                                        home
                                    </a>
                                    <a
                                        href="{{ url('/event') }}">
                                        event
                                    </a>
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="px-5 py-2 border-2 border-[#ec6090]  text-[#ec6090]  rounded-full font-semibold inline-flex justify-center items-center gap-2 hover:bg-[#ec6090] hover:text-white duration-200">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                @else
                                    <a
                                        
                                        href="{{ route('login') }}">
                                        home
                                    </a>

                                    <a
                                        href="{{ url('/dashboard') }}">
                                        event
                                    </a>

                                    @if (Route::has('login'))
                                        <a
                                            href="{{ route('login') }}"
                                            class=" px-5 py-2 border-2 border-[#ec6090]  text-[#ec6090]  rounded-full font-semibold flex flex-row justify-center items-center gap-2 hover:bg-[#ec6090] hover:text-white duration-200"
                                        >
                                        <span>login</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                                            <path d="M4 15H6V20H18V4H6V9H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V15ZM10 11V8L15 12L10 16V13H2V11H10Z">
                                            </path>
                                        </svg>
                                        </a>
                                    @endif
                                @endauth
                        @endif
                </div>
    </div>
</nav>