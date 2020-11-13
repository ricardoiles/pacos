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
        $fotos = DB::table('restaurantes as rest')
                ->leftjoin('foto_vid as fv', 'rest.FotoPerfil', '=', 'fv.id')
                ->join('foto_vid as fvp', 'rest.FotoPortada', '=', 'fvp.id')
                ->select('rest.id as resta', 'fv.Url as Perfil', 'fvp.Url as Portada')
                ->where('rest.nombre', $namepacos)
                ->get();


        $catcomidas = DB::table('catplatos AS cat')
                ->join('foto_vid AS fv', 'cat.Foto', '=', 'fv.id')
                ->join('restaurantes AS rest', 'rest.id', '=', 'cat.id_restaurante')
                ->select('cat.id AS idcat', 'cat.Descripcion AS nombrecat', 'fv.Url as fotocat')
                ->where('rest.nombre', $namepacos)
                ->get();

        $comidas = DB::table('restaurantes AS rest')
                ->join('platosxrest AS comidaxrest', 'comidaxrest.id_Rest', '=', 'rest.id')
                ->join('platos AS comida', 'comida.id', '=', 'comidaxrest.id_Plat')
                ->join('fotoxplato AS fxp', 'fxp.id_Plato', '=', 'comida.id')
                ->join('foto_vid AS fv', 'fv.id', '=', 'fxp.id_FotoVid')
                ->join('catplatos AS catp', 'catp.id_restaurante', '=', 'rest.id')
                ->join('foto_vid AS fcat', 'fcat.id', '=', 'catp.Foto')

                ->select('catp.id AS idcat', 'comida.id AS idcomida', 'comida.Nombre AS nombrecomida', 'comida.Descripcion AS ingredientes',
                        'comida.Precio AS preciocomida', 'rest.nombre', 'fv.Url AS foto')
                ->where('rest.nombre', $namepacos)
                ->get();
        
        
        return view('pacos.view_menucomidas')
                ->with('pacosinfo', $pacosinfo)
                ->with('fotos', $fotos)
                ->with('catcomidas', $catcomidas)
                ->with('comidas', $comidas);
    }

    public function vercomidas($idcat){
        
        $comidas = DB::table('platos AS pla')
                ->where('pla.Categoria', $idcat)
                ->get();
        
        return response()->json($comidas);
    }
}
