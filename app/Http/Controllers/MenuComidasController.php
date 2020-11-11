<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuComidasController extends Controller
{
    public function index($namepacos){
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
        
        
        return view('pacos.view_menucomidas')->with('pacosinfo', $pacosinfo)->with('redes', $redes)->with('fotos', $fotos);
    }
}
