<x-layout meta-title="Editar producto" meta-description="editar producto">
    <x-slot:heading>
     {{ $product->title }}
    </x-slot:heading>

    <h2 class="text-2xl font-bold mb-4 text-center">Editar Producto</h2>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-stone-300 shadow sm:rounded-lg">
            <form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-6 px-4 py-5 sm:p-6">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <!-- Nombre del Producto -->
                    <div>
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Producto</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300">
                                <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Nombre del producto" required />
                            </div>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Descripción</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3"
                                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-600"
                                      placeholder="Descripción del producto" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="price" class="block text-sm/6 font-medium text-gray-900">Precio</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <span class="text-gray-500 sm:text-sm">$</span>
                                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $product->price) }}"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="0" required />
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Marca -->
                    <div>
                        <label for="brand_id" class="block text-sm/6 font-medium text-gray-900">Marca</label>
                        <div class="mt-2">
                            <select name="brand_id" id="brand_id"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-600 focus:outline-2 focus:-outline-offset-2 focus:outline-black" required>
                                <option value="">Selecciona una marca</option>
                                @foreach(App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}"
                                            {{ (old('brand_id', $product->brand_id) == $brand->id) ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm/6 font-medium text-gray-900">Stock</label>
                        <div class="mt-2">
                            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-600 focus:outline-2 focus:-outline-offset-2 focus:outline-black"
                                   placeholder="Cantidad en stock" required />
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Imagen actual -->
                    @if($product->image)
                        <div>
                            <label class="block text-sm/6 font-medium text-gray-900 mb-2">Imagen actual</label>
                            <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endif

                    <!-- Subir Nueva Imagen -->
                    <div class="mt-9">
                        <div class="col-span-full">
                            <label for="image" class="block text-sm/6 font-medium text-gray-900">
                                {{ $product->image ? 'Cambiar foto' : 'Subir foto' }}
                            </label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm/6 text-gray-600">
                                        <label for="image" class="relative cursor-pointer text-indigo-600">
                                            <span>{{ $product->image ? 'Cambiar archivo' : 'Sube tu archivo' }}</span>
                                            <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">Suelta los archivos o haz click para agregarlos</p>
                                    </div>
                                    <p class="text-xs/5 text-black">PNG, JPG, GIF máximo 10MB</p>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Mostrar errores de validación -->
                    @if ($errors->any())
                        <div class="rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        Hay algunos errores en el formulario:
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc space-y-1 pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Botones -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('products.show', $product->id) }}" class="text-sm/6 font-semibold text-gray-900">Cancelar</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Actualizar Producto
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
