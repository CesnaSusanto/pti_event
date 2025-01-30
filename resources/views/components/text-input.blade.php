@props(['disabled' => false])

<<<<<<< HEAD
<div class="border-b-2 focus:border-pink-400">
    <input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-pink-400 focus:ring-pink-400 bg-none rounded-none border-none bg-transparent text-white/80']) }}>
</div>
=======
{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'border-b border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}> --}}
<div
      class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500"
    >
      <input
        {{ $attributes->merge(['class' => 'w-full border-none bg-transparent outline-none placeholder-opacity-25 focus:outline-none']) }}
      />
    </div>
>>>>>>> cb91465609d76e281dd5a83528c301dd92fd9671
