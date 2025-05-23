<x-layout>
    <x-slot:heading>
        Productos
    </x-slot:heading>


    <div class="space-y-4">

        @foreach ($products as $product)

            <a href="/products/{{ $product['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class= "font-bold text-blue-500 text-sm">{{ $product->developer->name}}</div>


            <div>
                <strong>{{ $product['title'] }}: </strong> {{ $product['description'] }}
            </div>

        </a>

        @endforeach

        <div>
            {{ $products->links() }}
        </div>

    </div>


</x-layout>
