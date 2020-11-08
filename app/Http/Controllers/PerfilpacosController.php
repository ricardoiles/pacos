<?php

namespace PACOS\Http\Controllers;

use PACOS\Perfilpacos;
use Illuminate\Http\Request;
use PACOS\Restaurantes;
use Illuminate\Support\Facades\DB;

class PerfilpacosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpacos)
    {
        //ver view_perfilpacos.blade.php
        $pacos = $idpacos;
        $categoria = 'Heladeria';
        $otro = 'mas info';
        $datos = ['paco' => $pacos, 'categoria' => $categoria, 'otro' => $otro];
        //return response()->json($datos);
        return view('pacos.prueba', ['data' => $datos]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\Perfilpacos  $perfilpacos
     * @return \Illuminate\Http\Response
     */
    public function show($namepacos)
    {
        //id del admin del sitio $namepacos recibido
        $idadminpacos = auth()->user()->id;
        //buscar admin en restaruante
        // $pacosinfo['pacosinfo']=Restaurantes::paginate()
        //                 ->leftJoin('categoria', 'categoria.id', '=', 'restaurantes.categoria' )
        //                 ->where('nombre', $namepacos);
        $pacosinfo = DB::table('restaurantes as rest')
                    ->leftJoin('horarioxrest as hores', 'hores.idRest', '=', 'rest.id')
                    ->leftJoin('horario as hor', 'hor.id', '=', 'hores.idHor')
                    ->leftJoin('categoria as cat', 'cat.id', '=', 'rest.categoria')
                    ->leftJoin('ciudades as ciu',  'ciu.id', '=', 'rest.Ciudad')
                    ->leftJoin('departamento as dep', 'dep.id', '=', 'ciu.Departamento') 
                    
                    ->select('cat.Nombre AS category', 'rest.id AS idrest', 'rest.nombre', 'rest.Descripcion',
                            'rest.pais', 'ciu.Nombre AS ciudad', 'dep.Nombre AS depto', 
                            'rest.BarrioVere', 'rest.Direccion', 'hor.DIa_Ini as diaopen', 'hor.Dia_cierre as diaclose', 
                            'hor.Hora_APert as horaopen', 'hor.Hora_cierre as horaclose', 'rest.domicilios', 'rest.reservas', 'rest.ordenes')
                    ->where('rest.nombre', $namepacos)
                    ->get();

        //return $pacosinfo;
        $redes = DB::table('restaurantes as rest')
                ->leftjoin('redesxrest as rr', 'rr.id_Rest', '=', 'rest.id')
                ->leftjoin('redes as red', 'rr.id_Redes', '=', 'red.id')
                ->leftjoin('tiporedes as tred', 'tred.id', '=', 'red.Tipo')
                ->select('red.Url', 'red.Icono', 'red.Tipo', 'tred.Nombre AS tipored')
                ->where('rest.nombre', $namepacos)
                ->get();

        //return $pacosinfo;
        $fotos = DB::table('restaurantes as rest')
                ->leftjoin('foto_vid as fv', 'rest.FotoPerfil', '=', 'fv.id')
                ->join('foto_vid as fvp', 'rest.FotoPortada', '=', 'fvp.id')
                ->select('rest.id as resta', 'fv.Url as Perfil', 'fvp.Url as Portada')
                ->where('rest.nombre', $namepacos)
                ->get();
                
        return view('pacos.view_perfilpacos')->with('pacosinfo', $pacosinfo)->with('redes', $redes)->with('fotos', $fotos);
        
        // if ($namepacos==$nombresitio) {
        //     $datos['datos']=Restaurantes::paginate();
        //     return view('pacos.view_perfilpacos', $pacosinfo);
        // }else {
        //     return view('errors.404');
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\Perfilpacos  $perfilpacos
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfilpacos $perfilpacos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\Perfilpacos  $perfilpacos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfilpacos $perfilpacos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\Perfilpacos  $perfilpacos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfilpacos $perfilpacos)
    {
        //
    }
}
