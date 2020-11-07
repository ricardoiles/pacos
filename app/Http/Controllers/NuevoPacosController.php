<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\NuevoPacos;
use PACOS\Restaurantes;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;


class NuevoPacosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nombresitio = auth()->user()->id;
        $city = DB::table('ciudades')->get();
        $categorias = DB::table('categoria')->get();
        $paises = DB::table('pais')->get();
        $paises = DB::table('pais')->get();

        return view('managepacos.view_nuevopacos')                    
                    ->with('categorias', $categorias)
                    ->with('paises', $paises)
                    ->with('city', $city);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $datapacos=request()->except('_token');
        $creadorpacos = request()->id_usuario;
        $nombrepacos = request()->nombre;
        Restaurantes::insert($datapacos);
        $pacosname = DB::table('restaurantes')
                        ->select('nombre')
                        ->where('nombre', $nombrepacos)
                        ->latest('nombre')
                        ->limit(1)
                        ->get();        
        if (isset($pacosname)) {
            return redirect('/manage/mipacos/'.$nombrepacos);
        }
        else{
            return redirect('/manage/mipacos/'.$nombrepacos);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\NuevoPacos  $nuevoPacos
     * @return \Illuminate\Http\Response
     */
    public function show(NuevoPacos $nuevoPacos)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\NuevoPacos  $nuevoPacos
     * @return \Illuminate\Http\Response
     */
    public function edit(NuevoPacos $nuevoPacos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\NuevoPacos  $nuevoPacos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NuevoPacos $nuevoPacos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\NuevoPacos  $nuevoPacos
     * @return \Illuminate\Http\Response
     */
    public function destroy(NuevoPacos $nuevoPacos)
    {
        //
    }
}
