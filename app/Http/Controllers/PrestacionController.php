<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrestacion;
use App\Http\Requests\UpdatePrestacion;
use App\Prestacion;
use Illuminate\Http\Request;

class PrestacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');

        $prestaciones = Prestacion::latest()
            ->search($q)
            ->paginate(7);
        return view('prestacion.index', compact('prestaciones', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrestacion $request)
    {
        $prestacion = new Prestacion($request->except('_token'));
        $prestacion->save();

        return redirect()->route('prestacion.index')->with('success', 'Nueva Prestacion ha sido creada con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestacion = Prestacion::findOrFail($id);
        return view('prestacion.edit', compact('prestacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestacion $request, $id)
    {
        $prestacion = Prestacion::findOrFail($id);

        $prestacion->update($request->all());

        return redirect()->route('prestacion.index')->with('success', 'Cambios relizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestacion $prestacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestacion $prestacion)
    {
        //
    }

    public function selectPrestacion(Request $request)
    {
        $prestacion = Prestacion::pluck('presta_nombre','id')->toArray();

        return $prestacion;
    }
}
