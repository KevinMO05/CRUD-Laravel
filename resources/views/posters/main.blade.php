@extends('layout.app')

@section('title', 'Lista de Vehículos')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Vehículos</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posters as $poster)
            <!-- Tarjeta de cada vehículo -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Imagen del vehículo -->
                <img src="{{ asset('storage/posters/' . $poster->foto) }}" alt="{{ $poster->nombre }}" class="mx-auto h-48 object-cover">

                <div class="p-4">
                    <!-- Detalles del vehículo -->
                    <h2 class="text-xl font-bold mb-2">{{ $poster->nombre }}</h2>
                    <p class="text-gray-700 mb-1"><strong>Marca:</strong> {{ $poster->marca_vehiculo }}</p>
                    <p class="text-gray-700 mb-1"><strong>Precio:</strong> ${{ number_format($poster->precio, 2, '.', ',') }}</p>
                    <p class="text-gray-700 mb-1"><strong>Año:</strong> {{ $poster->anio_vehiculo }}</p>
                    <p class="text-gray-700 mb-1"><strong>Fecha de Publicación:</strong> {{ $poster->fecha_publicacion }}</p>

                    <!-- Enlaces de acción (Ver más, Actualizar y Eliminar) -->
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('posters.show', $poster->id) }}" class="w-[30%] bg-green-500 text-center text-white px-4 py-2 rounded hover:bg-green-700">
                            Ver más
                        </a>

                        <a href="{{ route('posters.edit', $poster->id) }}" class="w-[30%] bg-blue-500 text-center text-white px-4 py-2 rounded hover:bg-blue-700">
                            Actualizar
                        </a>

                     <form action="{{ route('posters.destroy', $poster->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este vehículo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded hover:bg-red-700">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
