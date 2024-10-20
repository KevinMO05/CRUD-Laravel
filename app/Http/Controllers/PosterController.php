<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posters = Poster::all();
        return view('posters.main', compact('posters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),([
            'nombre' => 'required|string|max:255',
            'marca_vehiculo' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'anio_vehiculo' => 'required|numeric|min:1886|max:' . date('Y'),
        ]));
        if ($validated->fails()) {
            return redirect('/create-poster')->with('error', 'Rellene lo campos con los datos correctos');
        }
        $validated = Validator::make($request->all(),([
            'nombre' => 'required|string|max:255',
            'marca_vehiculo' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0|digits_between:1,10', // El precio debe tener entre 1 y 10 dígitos
            'anio_vehiculo' => 'required|numeric|min:1886|max:' . date('Y'),
        ]))->validate();

        // Crear el poster con los datos validados
        Poster::create($validated);

        // Redirigir a la página de creación con mensaje de éxito
        return redirect()->route('posters.create')->with('success', 'Poster creado correctamente');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
    { {
            // Validar los campos del formulario
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'marca_vehiculo' => 'required|string|max:255',
                'precio' => 'required|numeric|min:0',
                'anio_vehiculo' => 'required|numeric|min:1886|max:' . date('Y'),
                'fecha_publicacion' => 'required|date'
            ]);

            // Encontrar el vehículo por ID
            $poster = Poster::findOrFail($id);

            // Actualizar los datos del vehículo
            $poster->update($validated);

            // Redirigir con mensaje de éxito
            return redirect()->route('posters.main')->with('success', 'Vehículo actualizado correctamente');
        }
    }

   
    public function destroy($id)
    {
        
        $poster = Poster::findOrFail($id);

        $poster->delete();

        return redirect()->route('posters.main')->with('success', 'Vehículo eliminado correctamente');
    }
}
