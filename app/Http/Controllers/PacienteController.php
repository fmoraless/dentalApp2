<?php

namespace App\Http\Controllers;

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
        $name = $request->get('name');
        $pacientes = Paciente::latest('created_at')
            ->nombres('name')
            ->where('activo')
            ->paginate(10);

            return view('paciente.index', compact('pacinetes'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente = new Paciente;
        return view('paciente.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(paciente $paciente)
    {
        //
    }
}
