<x-guestlayout>
<x-navbar></x-navbar>
    <div class="bg-[#27292a] w-[100%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
        <div class="text-white uppercase font-semibold text-3xl w-full">
            <span>event at</span>
            <select class="text-[#ec6090] bg-transparent border-none outline-none uppercase text-3xl w-auto *:text-sm pr-14 hover:text-[#ec6090]/70 duration-100 rounded-lg ">
                <option value="" >bandung</option>
                <option value="" >jakarta</option>
                <option value="" >semarang</option>
                <option value="" >surabaya</option>
            </select>
        </div>
        <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
            
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-5 w-full ">
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>
            <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>

            </div>
        </div>
    </div>
</x-guestlayout>
