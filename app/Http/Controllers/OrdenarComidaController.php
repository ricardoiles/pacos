<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PACOS\Http\Controllers\Auth;
use Response;

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
                ->select('rest.id AS idrest', 'rest.nombre AS nombrerest', 'reserv.id AS idreserva', 'reserv.Fecha AS fechareserva', 'reserv.Hora_Ini AS horareserva', 'reserv.Detalle_Reserv AS consincomida', 'reserv.id_Usuario AS iduser', 
                    'reserv.total', 'reserv.total_desc', 'reserv.total_iva')
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

        /** This should output 2 */
        $idplatos = count(collect($request)->get('idcomida'));
        
        for ($i = 0; $i < $idplatos; $i++)
        {
            $platoid = $request->get('idcomida')[$i];
            $platonombre = $request->get('nombrecomida')[$i];
            $platoprecio = $request->get('preciocomida')[$i];
            $platocant = $request->get('cant')[$i];
            $platosubtotal = $request->get('sub_total')[$i];
            $platosubdesc = $request->get('sub_desc')[$i];
            $platosubiva = $request->get('sub_iva')[$i];
            // return $arrayName = array('platoid' => $platoid, 
            //                         'platoprecio' => $platoprecio, 
            //                         'platocant' => $platocant, 
            //                         'platosubtotal' => $platosubtotal,
            //                         'platosubdesc' => $platosubdesc,
            //                         'platosubiva' => $platosubiva);
        }
        $idres = $request->idres;
           

        //para insertar en BD

        DB::table('detalle_reserv')->insert(
            ['id_Plato' => $platoid, 'precio' => $platoprecio,  'cant' => $platocant, 'Subtotal' => $platosubtotal,
            'Sub_desc' => $platosubdesc, 'Sub_Iva' => $platosubiva, 'id_reserva' => $idres]
        );

        return 'se inserto, revisa la BD';
        
        
        // for( $i=1; $i+4; $i<$count){

        // return $count[$i]; 
        // return $request = $request->idcomida[0];

        // $id_Plato = $ordenes[$i];//request()->idcomida;
        // $nombrecomida = $ordenes[$i+1];//request()->nombrecomida;        
        // return $precio = $ordenes[$i+2];//request()->preciocomida;
        // $cant = $ordenes[$i+3];//request()->cant;


        // }
        //return $ordnes = (explode($request)) ;
        

        // $ordenes = explode ( ',' , serialize(request()->except('_token', 'idres')));

        //  $cont =1;
        //  $band =1;

        // foreach ($ordenes as $value) {
        //     # code...

        //     if($band%2==0){
        //     ($cont%4)==0 ? $cant = $value :($cont%3)==0 ? $precio = $value :($cont%2)==0 ? $nombrecomida = $value : $id_Plato =$value ;
            
        //     $cont++;
        //     }


        //     $band++;   

        // }

        //return $ordenes;
        
        //return $idres = $ordenes[0][0];//request()->idres;

        

        


        $Subtotal = request()->total;
        $Sub_desc = request()->total_desc;
        $Sub_Iva = request()->total_iva;

        
        
        
        
        // $nombrecomida = request()->nombrecomida;        
        // $precio = request()->preciocomida;
        // $cant = request()->cant;
        

        //  DB::table('reservas')
        //         ->where('id', $idres)
        //         ->update(['Detalle_Reserv' => '1']);

        // return 'se registro la orden, revisa la BD';
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
