<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HabitacionFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HabitacionController extends Controller
{
    public function __construct()
    {
        // Constructor vacío
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('texto');

        // Filtrar habitaciones por tipo si hay texto de búsqueda
        $habitaciones = Habitacion::when($query, function ($query, $search) {
            return $query->where('tipo', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(7);

        return view('almacen.habitacion.index', compact('habitaciones', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("almacen.habitacion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitacionFormRequest $request)
    {
        $habitacion = new Habitacion;
        $habitacion->tipo = $request->tipo;
        $habitacion->numero = $request->numero;
        $habitacion->precio = $request->precio;

        if ($request->hasFile("fotografias")) {
            $imagen = $request->file("fotografias");
            $nombreimagen = Str::slug($request->tipo) . "." . $imagen->guessExtension();
            $ruta = public_path("/fotografias/habitaciones/");

            $imagen->move($ruta, $nombreimagen);
            $habitacion->fotografias = $nombreimagen;
        }

        $habitacion->save();
        return redirect()->route('habitacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view("almacen.habitacion.show", compact('habitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view("almacen.habitacion.edit", compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitacionFormRequest $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->tipo = $request->tipo;
        $habitacion->numero = $request->numero;
        $habitacion->precio = $request->precio;

        if ($request->hasFile("fotografias")) {
            $imagen = $request->file("fotografias");
            $nombreimagen = Str::slug($request->tipo) . "." . $imagen->guessExtension();
            $ruta = public_path("/fotografias/habitaciones/");

            $imagen->move($ruta, $nombreimagen);
            $habitacion->fotografias = $nombreimagen;
        }

        $habitacion->save();
        return redirect()->route('habitacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();
        
        return redirect()->route('habitacion.index')
            ->with('success', 'Habitación eliminada correctamente');
    }
}
