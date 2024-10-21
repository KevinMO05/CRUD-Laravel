<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    //Metodo para redijir a la pantalla principal
    public function index()
    {
        $posters = Poster::all();
        return view('posters.main', compact('posters'));
    }

    //Metodo para redijir a la pantalla de creacion de un poster
    public function create()
    {
        return view('posters.create');
    }

    //Metodo donde se desarolla la logica para la creacion de un nuevo poster (lo redirije un metodo POST)
    public function store(Request $request)
    {
        // Validar los campos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'marca_vehiculo' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'anio_vehiculo' => 'required|numeric|min:1886|max:' . date('Y'),
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
    
        // Si hay un archivo de imagen, subirlo
        if ($request->hasFile('foto')) {
            $file = $request->file('foto'); //obtener la imagen
            $destinationPath = 'storage/posters/'; // directorio de destino de la imagen
            $filename = time() . '_' . $file->getClientOriginalName(); // renombrar la imagen con un timestamp unico 
            $path = $file->move($destinationPath, $filename); // subir la imagen al directorio de destino

            $validatedData['foto'] = $filename; // asignar el nombre de la imagen al campo 'foto'
        }
    
        Poster::create($validatedData);
    
        
        return redirect()->route('posters.create')->with('success', 'Poster creado correctamente');
    }
    


    public function show($id)
    {
        $poster = Poster::findOrFail($id);
    
        return view('posters.show', compact('poster'));
    }
   
    public function edit(string $id)
    {
        // Encontrar el vehículo por ID
        $poster = Poster::findOrFail($id);

        // Retornar la vista de actualización con los datos del vehículo
        return view('posters.update', compact('poster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validar los campos del formulario, incluyendo la validación condicional de la imagen
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'marca_vehiculo' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'anio_vehiculo' => 'required|numeric|min:1886|max:' . date('Y'),
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es opcional en la actualización
        'fecha_publicacion' => 'required|date',
    ]);

    // Encontrar el vehículo por ID
    $poster = Poster::findOrFail($id);

    
    if ($request->hasFile('foto')) {
        // Eliminar la imagen anterior si existe
        if ($poster->foto && file_exists(storage_path('app/public/posters/' . $poster->foto))) {
            unlink(storage_path('app/public/posters/' . $poster->foto));
        }

        // Subir la nueva imagen
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->move('storage/posters', $filename);

        // Añadir el nombre del nuevo archivo al array de datos validados
        $validatedData['foto'] = $filename;
    }

    // Actualizar los datos del vehículo
    $poster->update($validatedData);

    // Redirigir con mensaje de éxito
    return redirect()->route('posters.main')->with('success', 'Vehículo actualizado correctamente');
}



    public function destroy($id)
    {

        $poster = Poster::findOrFail($id);

        $poster->delete();

        return redirect()->route('posters.main')->with('success', 'Poster eliminado correctamente');
    }
}
