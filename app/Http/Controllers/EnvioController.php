<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Envio;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $envios = Envio::paginate(10);
        return view('admin.envios.index', compact('envios'));
    }

    public function create()
    {
        $boletas = Boleta::all();
        return view('admin.envios.create', compact('boletas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_entrega' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
            'estado' => 'required',
            'boleta_id' => 'required|exists:boletas,id',
        ]);
        Envio::create($request->all());
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Boleta creada correctamente',
        ]);
        return redirect()->route('admin.envios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Envio $envio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Envio $envio)

    {
        $boletas = Boleta::all();
        return view('admin.envios.edit', compact('boletas', 'envio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Envio $envio)
    {
        $request->validate([
            'fecha_entrega' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
            'estado' => 'required',
            'boleta_id' => 'required|exists:boletas,id',
        ]);
        $envio->update($request->all());
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Boleta actualizada con éxito',
        ]);
        return redirect()->route('admin.envios.edit', $envio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Envio $envio)
    {

        $envio->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La boleta ha sido eliminada correctamente',
        ]);
        return redirect()->route('admin.envios.index');
    }
}
