<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Prestacion;
use App\Presupuesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PresupuestoResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        //$paciente = Paciente::findOrFail($id);
        $presupuestos = Presupuesto::latest()->where('presup_creador', Auth::user()->rut)->paginate(4);
        //$presupuestos = Presupuesto::where('paciente_id', $id)->orderBy('created_at', 'desc')->paginate(3);
        return view('presupuesto.index', compact('presupuestos'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$pacientes = Paciente::select(\DB::raw('CONCAT(nombres, " ", apellido_paterno, " - ", rut) AS full_name, id'))->pluck('full_name', 'id');
        //$prestaciones = Prestacion::orderBy('presta_nombre', 'DESC')->pluck('presta_nombre', 'id');

        $prestaciones = Prestacion::all();
        $pacientes = Paciente::all();
        //dd($pacientes);
        //dd($prestaciones);
        return view('presupuesto.create', compact('prestaciones', 'pacientes'));

//        return view('presupuesto.create');
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
        $presupuesto = Presupuesto::create($request->all());
        $presupuesto->presup_creador = \auth()->user()->rut;
        $presupuesto->user_id = \auth()->user()->id;
        $presupuesto->presup_expiracion = new Carbon('next month');
        $presupuesto->paciente_id = $request->paciente_id;
        $presupuesto->save();

        $prestaciones = $request->input('prestaciones', []);
        $cantidades = $request->input('cantidades', []);
        for ($prestacion=0; $prestacion < count($prestaciones); $prestacion++) {
            if ($prestaciones[$prestacion] != '') {
                $presupuesto->prestaciones()->attach($prestaciones[$prestacion], ['cantidad' => $cantidades[$prestacion]]);
            }
        }

        return redirect()->route('presupuesto.index');

        //dd($request->all());
        /*$presupuesto = new Presupuesto($request->except('_token'));
        $presupuesto->presup_creador = Auth::user()->rut;
        $presupuesto->presup_expiracion = Carbon::now()->addMonth();
        $presupuesto->paciente_id = $request->paciente_id;
        $presupuesto->save();

        $presupuesto->prestaciones()->sync($request->prestaciones);

        return redirect()->route('presupuesto.index' . $request->paciente_id);*/
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);

        return view('presupuesto.show',compact('presupuesto'));
            //$presupuesto->load('prestaciones');
        //dd($presupuesto);
        //return view('presupuesto.show', compact('presupuesto'));

/*         $presupuesto = Presupuesto::findOrFail($id);

        $view = view('presupuesto.show', compact('presupuesto'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->stream('presupuesto_' . $presupuesto->id . '.pdf'); */
    }

    public function getPdf($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);

        $view = view('presupuesto.getpdf', compact('presupuesto'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->stream('presupuesto_' . $presupuesto->id . '.pdf');
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
