@props(['disabled' => false])

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'border-b border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}> --}}
<div
      class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500"
    >
      <input
        {{ $attributes->merge(['class' => 'w-full border-none bg-transparent outline-none placeholder-opacity-25 focus:outline-none']) }}
      />
    </div>
