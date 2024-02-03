<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletas = Boleta::paginate(10);
        return view('admin.boletas.index', compact('boletas'));
    }

    public function create()
    {
        return view('admin.boletas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'dni' => 'required|numeric|digits:8',
            'codigo' => 'required|unique:boletas,codigo',
        ]);
        Boleta::create($request->all());
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Boleta creada correctamente',
        ]);
        return redirect()->route('admin.boletas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Boleta $boleta)
    {
        // Accede directamente a la relación y obtén los resultados
        $boleta->envios;

        // Devuelve la respuesta en formato JSON
        return response()->json(['boleta' => $boleta]);
    }
    public function valida(Request $request)
    {
        $boleta = Boleta::where('codigo', $request->boleta)->first();
        if ($boleta) {
            if ($request->codigo == $boleta->dni)
                return redirect()->route('boletas.show', $boleta);
        }
        session()->flash('swal', [
            'icon' => 'error',
            'title' => '¡Ups!',
            'text' => 'El código ingresado no coincide con el DNI',
        ]);
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boleta $boleta)
    {
        return view('admin.boletas.edit', compact('boleta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boleta $boleta)
    {
        $request->validate([
            'nombre' => 'required',
            'dni' => 'required|numeric|digits:8',
            'codigo' => 'required|unique:boletas,codigo,' . $boleta->id,
        ]);
        $boleta->update($request->all());
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Boleta actualizada con éxito',
        ]);
        return redirect()->route('admin.boletas.edit', $boleta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boleta $boleta)
    {
        if ($boleta->envios()->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'La boleta no se puede eliminar porque tiene envios asociadas',
            ]);
            return redirect()->route('admin.boletas.edit', $boleta);
        }
        $boleta->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La boleta ha sido eliminada correctamente',
        ]);
        return redirect()->route('admin.boletas.index');
    }
}
