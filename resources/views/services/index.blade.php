<x-layout>
    <x-slot:heading>
        Services Page
    </x-slot:heading>


    <div class="space-y-4">

        @foreach ($services as $service)

            <a href="/services/{{ $service['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class= "font-bold text-blue-500 text-sm">{{ $service->developer->name}}</div>


            <div>
                <strong>{{ $service['title'] }}: </strong> {{ $service['description'] }}
            </div>

        </a>

        @endforeach

        <div>
            {{ $services->links() }}
        </div>

    </div>


</x-layout>
