<x-layout>
    <x-slot name="heading">
        Productos
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="font-bold text-lg">
                {{ $product->title }}
            </h2>

            <!-- Botones de acción -->
            <div class="flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}"
                   class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Editar
                </a>

                <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                      onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?')"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Eliminar
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-3">
            <p class="text-gray-700">
                <span class="font-medium">Descripción:</span> {{ $product['description'] }}
            </p>

            <p class="text-gray-700">
                <span class="font-medium">Precio:</span>
                <span class="text-green-600 font-semibold">${{ number_format($product['price'], 2) }}</span>
            </p>

            <p class="text-gray-700">
                <span class="font-medium">Marca:</span> {{ $product->brand?->name ?? 'Sin marca' }}
            </p>
        </div>

        <!-- Botón para volver a la lista -->
        <div class="mt-6 pt-4 border-t border-gray-200">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a la lista
            </a>
        </div>
    </div>
</x-layout>
