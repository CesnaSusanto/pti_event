<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-wide py-4 bg-pink-400 hover:bg-pink-300 active:bg-pink-300 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
