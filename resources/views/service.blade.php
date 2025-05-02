<x-layout>
    <x-slot name="heading">
        Services Page
    </x-slot>

    <h2 class="font-bold text-lg">{{ $service['title'] }}</h2>

    <p>
        My Services: {{ $service['description'] }}
    </p>
</x-layout>
