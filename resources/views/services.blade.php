<x-layout>
    <x-slot:heading>
        Services Page
    </x-slot:heading>


    <ul>

        @foreach ($services as $service)
        <li>
            <a href="/services/{{ $service['id'] }}">
            <strong>{{ $service['title'] }}: </strong> description {{ $service['description'] }}
            </a>
        </li>
        @endforeach

    </ul>


</x-layout>
