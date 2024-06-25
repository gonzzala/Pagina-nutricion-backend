@props(['rows' => 3])

<textarea {{ $attributes->merge(['class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm']) }} rows="{{ $rows }}">{{ $slot }}</textarea>
