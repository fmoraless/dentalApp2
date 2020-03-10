<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaciente;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');

        $pacientes = Paciente::latest()
            ->search($q)
            ->where('activo', '=', 1)
            ->paginate(5);

        return view('paciente.index', compact('pacientes', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaciente $request)
    {
        $paciente = new Paciente($request->except('_token'));
        $paciente->save();

        return redirect()->route('paciente.index')->with('success', 'Nuevo Paciente ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(paciente $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('paciente.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(paciente $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $paciente->update($request->all());

        return redirect()->route('paciente.index')->with('success', 'Cambios relizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(paciente $paciente)
    {
        //
    }
}
