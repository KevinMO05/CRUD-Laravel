@extends('layout.app')

@section('title', 'Detalles del Vehículo')

@section('content')
    <h1 class="text-2xl font-bold mb-4"> {{ $poster->nombre }}</h1>

    <div class="flex flex-col lg:flex-row bg-white shadow-md rounded-lg overflow-hidden w-[80%] mx-auto p-4">
        <div class="lg:w-1/2">
            <img src="{{ asset('storage/posters/' . $poster->foto) }}" alt="{{ $poster->nombre }}"
                class="w-[80%] h-auto object-cover">
        </div>

        <div class="lg:w-1/2 p-6">
            <h2 class="text-3xl font-bold mb-4">{{ $poster->nombre }}</h2>

            <p class="text-gray-700 mb-3"><strong>Marca del Vehículo:</strong> {{ $poster->marca_vehiculo }}</p>
            <p class="text-gray-700 mb-3"><strong>Precio:</strong> ${{ number_format($poster->precio, 2, '.', ',') }}</p>
            <p class="text-gray-700 mb-3"><strong>Año del Vehículo:</strong> {{ $poster->anio_vehiculo }}</p>
            <p class="text-gray-700 mb-3"><strong>Fecha de Publicación:</strong> {{ $poster->fecha_publicacion }}</p>

            <div class="mt-6">
                <a href="{{ route('posters.main') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection
