<x-layout meta-title="Crear" meta-description="mostrar productos">
    <x-slot name="heading">
        Productos
    </x-slot>



    <div class="space-y-4">

        @foreach ($products as $product)

            <a href="/products/{{$product['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $product->brand?->name ?? 'Sin marca' }}
                </div>



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
