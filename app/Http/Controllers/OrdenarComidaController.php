<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PACOS\Http\Controllers\Auth;

class OrdenarComidaController extends Controller
{
    public function index($namepacos, $reservacion){
    	
        $iduser = auth()->user()->id;

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

        $reservaciones = DB::table('reservas AS reserv')
                ->leftjoin('mesas AS mesas', 'mesas.id', '=', 'reserv.id_Mesa')
                ->leftjoin('restaurantes AS rest', 'rest.id', '=', 'mesas.Restaurante')
                ->select('rest.id AS idrest', 'rest.nombre AS nombrerest', 'reserv.id AS idreserva', 'reserv.Fecha AS fechareserva', 'reserv.Hora_Ini AS horareserva', 'reserv.Detalle_Reserv AS consincomida', 'reserv.id_Usuario AS iduser')
                ->where('reserv.id_Usuario', '=', $iduser)
                ->where(function ($query) use($namepacos, $reservacion) {
                    $query->where('rest.nombre', '=', $namepacos)
                          ->where('reserv.id', '=', $reservacion);
                })
                ->get();

        $comidas = DB::table('restaurantes AS rest')
                ->join('platosxrest AS comidaxrest', 'comidaxrest.id_Rest', '=', 'rest.id')
                ->join('platos AS comida', 'comida.id', '=', 'comidaxrest.id_Plat')
                ->join('fotoxplato AS fxp', 'fxp.id_Plato', '=', 'comida.id')
                ->join('foto_vid AS fv', 'fv.id', '=', 'fxp.id_FotoVid')
                ->select('comida.id AS idcomida', 'comida.Nombre AS nombrecomida', 'comida.Descripcion AS ingredientes', 'comida.Precio AS preciocomida', 'rest.nombre', 'fv.Url AS fotocomida')
                ->where('rest.nombre', $namepacos)
                ->get();

    	return view('pacos.view_ordenarcomidas')
                ->with('pacosinfo', $pacosinfo)
                ->with('fotos', $fotos)
                ->with('reservaciones', $reservaciones)
                ->with('comidas', $comidas);
    }

    public function store(Request $request){
        $id_Plato = request()->plato;
        
        $precio = request()->platoprecio;
        $cant = request()->cant;
        return $request = request();
        
        return response()->json($request);
        
        
        
        DB::table('detalle_reserv')->insert(
                ['id_Plato' => $id_Plato, 'precio' => $precio,  'cant' => $cant, 'Subtotal' => $Subtotal,
                'Sub_desc' => $Sub_desc, 'Sub_Iva' => $Sub_Iva]
            );
        return 'se registro la orden';
    }

    public function ordencomida($namepacos, $idcomida){
        
        $comidas = DB::table('restaurantes AS rest')
                ->join('platosxrest AS comidaxrest', 'comidaxrest.id_Rest', '=', 'rest.id')
                ->join('platos AS comida', 'comida.id', '=', 'comidaxrest.id_Plat')
                ->join('fotoxplato AS fxp', 'fxp.id_Plato', '=', 'comida.id')
                ->join('foto_vid AS fv', 'fv.id', '=', 'fxp.id_FotoVid')
                ->select('comida.id AS idcomida', 'comida.Nombre AS nombrecomida', 'comida.Descripcion AS ingredientes', 'comida.Precio AS preciocomida', 'comida.cant as cant',  'rest.nombre', 'fv.Url AS fotocomida')
                ->where('rest.nombre', $namepacos)
                ->where(function ($query) use($idcomida) {
                    $query->where('comida.id', '=', $idcomida);
                })
                ->get();
        return response()->json($comidas);
    }
}
