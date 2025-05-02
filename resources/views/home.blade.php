<x-layout>
    <x-slot name="heading">
        Home Page
    </x-slot>



     <div class="relative w-full h-[500px] mt-6">
        <img src="{{ asset('https://img.freepik.com/foto-gratis/trabajando-oficina_1150-121.jpg') }}" alt="Imagen de fondo" class="w-full h-full object-cover rounded-xl shadow-md">
        <div class="absolute inset-0 flex items-center justify-center">
            <a href="#contacto" class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg hover:bg-blue-700 transition">
                Contactar
            </a>
        </div>
    </div>


    <div id="contacto" class="mt-10 p-6 bg-gray-100 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">Contáctanos</h2>
        <p class="text-gray-700">Puedes escribirnos para más información.</p>
    </div>


</x-layout>


