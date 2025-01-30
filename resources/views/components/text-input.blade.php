@props(['disabled' => false])

<div class="border-b-2 focus:border-pink-400">
    <input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-pink-400 focus:ring-pink-400 bg-none rounded-none border-none bg-transparent text-white/80']) }}>
</div>
