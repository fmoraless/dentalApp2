<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Prestacion;
use App\Presupuesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presupuesto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $paciente = Paciente::findOrFail($id);
        $prestaciones = Prestacion::orderBy('presta_nombre', 'DESC')->pluck('presta_nombre', 'id');

        return view('presupuesto.create', compact('paciente', 'prestaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $presupuesto = new Presupuesto($request->except('_token'));
        $presupuesto->presup_creador = Auth::user()->rut;
        $presupuesto->presup_expiracion = Carbon::now()->addMonth();
        $presupuesto->paciente_id = $request->paciente_id;
        $presupuesto->save();

        $presupuesto->prestaciones()->sync($request->prestaciones);

        return redirect()->route('paciente/' . $request->paciente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}
