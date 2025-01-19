<nav class="bg-[#1f2122] w-full h-32 px-8 sticky z-10 top-0 flex flex-row items-center justify-center">
    <div class="h-full w-[95%] max-w-[1400px] flex flex-row justify-between items-center">
        <img src="image/logo.png" alt="logo" srcset="" class="h-full object-contain">
        <div class="flex gap-6 items-center text-[#9e9e9e] capitalize">
                @if (Route::has('login'))
                                @auth
                                    <a class="capitalize"
                                        href="{{ url('/dashboard') }}">
                                        home
                                    </a>
                                @else
                                    <a
                                        
                                        href="{{ route('login') }}">
                                        home
                                    </a>

                                    <a
                                        href="{{ url('/dashboard') }}">
                                        event
                                    </a>
                                    <a
                                        href="{{ url('/dashboard') }}">
                                        profile
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
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