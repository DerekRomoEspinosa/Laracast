@props(['active' => false])

<a class="{{ $active ? 'bg-gray-300 text-black font-semibold' : 'text-black hover:bg-gray-300 hover:text-black' }} rounded-md px-3 py-2 text-sm font-medium"
     aria-current="{{ $active ? 'page': 'false' }}"
     {{ $attributes }}
     >{{ $slot }}</a>
