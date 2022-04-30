<?php

namespace App\Http\Controllers;

use App\Models\Operaciones;
use App\Http\Requests\StoreOperacionesRequest;
use App\Http\Requests\UpdateOperacionesRequest;
use Illuminate\Support\Facades\DB;


class OperacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalEgreso = DB::table('Operaciones')
        ->where('tipo', 'egreso')
        ->sum("monto");

        $totalIngreso = DB::table('Operaciones')
                ->where('tipo', 'ingreso')
                ->sum("monto");

        $balance= $totalIngreso -$totalEgreso;
       
        //ultimos 5 registros
        $operaciones = Operaciones::latest()
        ->take(10)
        ->get();
        
        return view('operaciones.index')->with('operaciones',$operaciones)->with('balance' ,$balance);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperacionesRequest $request)
    {   
        
        // $request->validate([
        //     'concepto' => 'required',
        //     'monto' => 'required',
        //     'fecha' => 'required',
        //     'tipo' => 'required',
        // ]);
        Operaciones::create($request -> all());

        return redirect('/api/operaciones');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operaciones  $operaciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operaciones = Operaciones::find($id);
   
        return $operaciones;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operaciones  $operaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operacion= Operaciones::find($id);
        return view('operaciones.edit')->with('operacion',$operacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperacionesRequest  $request
     * @param  \App\Models\Operaciones  $operaciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperacionesRequest $request, $id)
    {
        $operacion= Operaciones::findOrFail($id);
        $operacion->update($request->all());
        return redirect('/api/operaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operaciones  $operaciones
     * @return \Illuminate\Http\Response
     */
    //id de la funcion viene de front, con eloquent findOrFail encuentra al id requerido de la tabla operaciones 
    public function destroy($id)
    {
        $operaciones= Operaciones::find($id);
        $operaciones->delete();
        return redirect('/api/operaciones');
    }

    public function balance()
    {
        $totalEgreso = DB::table('Operaciones')
                        ->where('tipo', 'egreso')
                        ->sum("monto");

        $totalIngreso = DB::table('Operaciones')
                        ->where('tipo', 'ingreso')
                        ->sum("monto");
        
        $balance= $totalIngreso -$totalEgreso;
        return view('operaciones.index')->with('balance',$balance);

    }



}
