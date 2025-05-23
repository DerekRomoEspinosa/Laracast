<x-layout>
    <x-slot name="heading">
        Products Page
    </x-slot>

    <h2 class="font-bold text-lg">{{ $product['title'] }}</h2>

    <p>
        My Products: {{ $product['description'] }}
    </p>
</x-layout>
