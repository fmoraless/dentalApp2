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
        $presupuestos = Presupuesto::all();
        return view('presupuesto.index', compact('presupuestos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$paciente = Paciente::findOrFail($id);
        $prestaciones = Prestacion::orderBy('presta_nombre', 'DESC')->pluck('presta_nombre', 'id');*/

        return view('presupuesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
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
        dd($presupuesto);
        return view('presupuesto.show',compact('presupuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        return view('presupuesto.edit', compact('presupuesto'));

        /*$presupuesto = Presupuesto::findOrFail($id);
        return view('presupuesto.edit', compact('presupuesto'));*/
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
