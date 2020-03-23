<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Paciente;
use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $paciente = Paciente::findOrFail($id);
        $mensajes = Mensaje::where('paciente_id', $id)->orderBy('fecha_mensaje', 'desc')->paginate(3);

        return view('mensaje.index', compact('mensajes', 'paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $paciente = Paciente::findOrFail($id);

        return view('mensaje.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $mensaje = new Mensaje($request->except('_token'));
        $mensaje->creador_mensaje = Auth::user()->rut;
        $mensaje->paciente_id = $request->paciente_id;
        $mensaje->save();

        return redirect('paciente/'.$request->paciente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mensaje $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mensaje $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mensaje $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mensaje $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
