@extends('layout.app')

@section('title', 'Actualizar Vehículo')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Actualizar Poster</h1>

    <!-- Formulario para actualizar vehículo -->
    <form action="{{ route('posters.update', $poster->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6 w-[80%] mx-auto">
        @csrf
        @method('PUT') <!-- necesario para actualizar un registro -->

        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="w-full border px-3 py-2 rounded-lg" value="{{ $poster->nombre }}" required>
        </div>

        <!-- Campo Marca del Vehículo -->
        <div class="mb-4">
            <label for="marca_vehiculo" class="block text-gray-700 font-bold mb-2">Marca de Vehículo:</label>
            <input type="text" name="marca_vehiculo" id="marca_vehiculo" class="w-full border px-3 py-2 rounded-lg" value="{{ $poster->marca_vehiculo }}" required>
        </div>

        <!-- Campo Precio -->
        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-bold mb-2">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" class="w-full border px-3 py-2 rounded-lg" value="{{ $poster->precio }}" required>
        </div>

        <!-- Campo Año del Vehículo -->
        <div class="mb-4">
            <label for="anio_vehiculo" class="block text-gray-700 font-bold mb-2">Año del Vehículo:</label>
            <input type="number" name="anio_vehiculo" id="anio_vehiculo" class="w-full border px-3 py-2 rounded-lg" value="{{ $poster->anio_vehiculo }}" required>
        </div>

        <!-- Campo Foto actual -->
        <div class="mb-4">
            <label for="foto_actual" class="block text-gray-700 font-bold mb-2">Foto Actual:</label>
            <img src="{{ asset('storage/posters/' . $poster->foto) }}" alt="{{ $poster->nombre }}" class="w-32 h-32 object-cover mb-2">
        </div>

        <!-- Campo para subir nueva imagen -->
        <div class="mb-4">
            <label for="foto" class="block text-gray-700 font-bold mb-2">Cambiar Foto:</label>
            <input type="file" name="foto" id="foto" class="w-full border px-3 py-2 rounded-lg">
        </div>

        <!-- Campo Fecha de Publicación (bloqueado) -->
        <div class="mb-4">
            <label for="fecha_publicacion" class="block text-gray-700 font-bold mb-2">Fecha de Publicación:</label>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="w-full border px-3 py-2 rounded-lg" value="{{ $poster->fecha_publicacion }}" readonly>
        </div>

       <!-- Botón para actualizar -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Actualizar poster
            </button>
        </div>
    </form>
@endsection
