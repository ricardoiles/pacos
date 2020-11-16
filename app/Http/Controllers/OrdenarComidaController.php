<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PACOS\Http\Controllers\Auth;
use Response;

class OrdenarComidaController extends Controller{

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
                    'reserv.total', 'reserv.total_desc', 'reserv.total_iva', 'mesas.numero', 'mesas.Puestos')
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

        $comidasordenadas = DB::table('detalle_reserv AS dr')
                ->join('reservas AS re', 're.id', '=', 'dr.id_reserva')
                ->join('platos AS pla', 'pla.id', '=', 'dr.id_Plato')
                ->join('fotoxplato AS fxp', 'fxp.id_Plato', '=', 'pla.id')
                ->join('foto_vid AS fv', 'fv.id', '=', 'fxp.id_FotoVid')
                ->select('dr.id AS idorden', 'dr.cant AS cantorden', 'dr.Subtotal AS subtotal', 'dr.Sub_desc AS sub_desc', 'dr.Sub_Iva AS sub_iva', 're.id as idreserva' ,'pla.Nombre as nombrecomida', 'pla.Descripcion AS ingredientes', 'pla.Precio AS precio', 'fv.Url AS fotocomida')
                ->where('re.id', $reservacion)
                ->get();
        

    	return view('pacos.view_ordenarcomidas')
                ->with('pacosinfo', $pacosinfo)
                ->with('fotos', $fotos)
                ->with('reservaciones', $reservaciones)
                ->with('comidas', $comidas)
                ->with('comidasordenadas', $comidasordenadas);
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

    public function store(Request $request){
        $datos = request()->except('_token', 'idres', 'nombrepacos');
        if (empty($datos)) {
            $idres = $request->idres;
            $namepacos = $request->nombrepacos;
            return redirect('/pacos/'.$namepacos.'/'.$idres.'/ordenarcomida');
        }else{
            $idres = $request->idres;
            $namepacos = $request->nombrepacos;
            DB::table('reservas')
                ->where('id', $idres)
                ->update(['Detalle_Reserv' => '1']);

            $idplatos = count(collect($request)->get('idcomida'));
            
            for ($i = 0; $i < $idplatos; $i++){
                //primer comida
                if ($i > $idplatos) {
                    break;
                }else{
                    $platoid = $request->get('idcomida')[$i];
                    $platonombre = $request->get('nombrecomida')[$i];
                    $platoprecio = $request->get('preciocomida')[$i];
                    $platocant = $request->get('cant')[$i];
                    $platosubtotal = $request->get('sub_total')[$i];
                    $platosubdesc = $request->get('sub_desc')[$i];
                    $platosubiva = $request->get('sub_iva')[$i];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid, 'precio' => $platoprecio,  'cant' => $platocant, 'Subtotal' => $platosubtotal,
                        'Sub_desc' => $platosubdesc, 'Sub_Iva' => $platosubiva, 'id_reserva' => $idres]
                    );
                    continue;
                    return 'aqui1';
                }
                
                //segunda comida
                if ($i+1 > $idplatos) {
                    break;
                }else{
                    $platoid2 = $request->get('idcomida')[$i+1];
                    $platonombre2 = $request->get('nombrecomida')[$i+1];
                    $platoprecio2 = $request->get('preciocomida')[$i+1];
                    $platocant2 = $request->get('cant')[$i+1];
                    $platosubtotal2 = $request->get('sub_total')[$i+1];
                    $platosubdesc2 = $request->get('sub_desc')[$i+1];
                    $platosubiva2 = $request->get('sub_iva')[$i+1];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid2, 'precio' => $platoprecio2,  'cant' => $platocant2, 'Subtotal' => $platosubtotal2,
                        'Sub_desc' => $platosubdesc2, 'Sub_Iva' => $platosubiva2, 'id_reserva' => $idres]
                    );
                    continue;
                    return 'aqui2';
                }

                //terecera comida
                if ($i+2 > $idplatos) {
                    break;
                }else{
                    $platoid3 = $request->get('idcomida')[$i+2];
                    $platonombre3 = $request->get('nombrecomida')[$i+2];
                    $platoprecio3 = $request->get('preciocomida')[$i+2];
                    $platocant3 = $request->get('cant')[$i+2];
                    $platosubtotal3 = $request->get('sub_total')[$i+2];
                    $platosubdesc3 = $request->get('sub_desc')[$i+2];
                    $platosubiva3 = $request->get('sub_iva')[$i+2];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid3, 'precio' => $platoprecio3,  'cant' => $platocant3, 'Subtotal' => $platosubtotal3,
                        'Sub_desc' => $platosubdesc3, 'Sub_Iva' => $platosubiva3, 'id_reserva' => $idres]
                    );
                    continue;
                    return 'aqui3';
                }
                
                //cuarta comida
                if ($i+3 > $idplatos) {
                    break;
                }else{
                    $platoid4 = $request->get('idcomida')[$i+3];
                    $platonombre4 = $request->get('nombrecomida')[$i+3];
                    $platoprecio4 = $request->get('preciocomida')[$i+3];
                    $platocant4 = $request->get('cant')[$i+3];
                    $platosubtotal4 = $request->get('sub_total')[$i+3];
                    $platosubdesc4 = $request->get('sub_desc')[$i+3];
                    $platosubiva4 = $request->get('sub_iva')[$i+3];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid4, 'precio' => $platoprecio4,  'cant' => $platocant4, 'Subtotal' => $platosubtotal4,
                        'Sub_desc' => $platosubdesc4, 'Sub_Iva' => $platosubiva4, 'id_reserva' => $idres]
                    );
                    continue;
                }
                
                //quinta comida
                if ($i+4 > $idplatos) {
                    break;
                }else{
                    $platoid5 = $request->get('idcomida')[$i+4];
                    $platonombre5 = $request->get('nombrecomida')[$i+4];
                    $platoprecio5 = $request->get('preciocomida')[$i+4];
                    $platocant5 = $request->get('cant')[$i+4];
                    $platosubtotal5 = $request->get('sub_total')[$i+4];
                    $platosubdesc5 = $request->get('sub_desc')[$i+4];
                    $platosubiva5 = $request->get('sub_iva')[$i+4];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid5, 'precio' => $platoprecio5,  'cant' => $platocant5, 'Subtotal' => $platosubtotal5,
                        'Sub_desc' => $platosubdesc5, 'Sub_Iva' => $platosubiva5, 'id_reserva' => $idres]
                    );
                    continue;
                }
                
                //sexta comida
                if ($i+5 > $idplatos) {
                    break;
                }else{
                    $platoid6 = $request->get('idcomida')[$i+5];
                    $platonombre6 = $request->get('nombrecomida')[$i+5];
                    $platoprecio6 = $request->get('preciocomida')[$i+5];
                    $platocant6 = $request->get('cant')[$i+5];
                    $platosubtotal6 = $request->get('sub_total')[$i+5];
                    $platosubdesc6 = $request->get('sub_desc')[$i+5];
                    $platosubiva6 = $request->get('sub_iva')[$i+5];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid6, 'precio' => $platoprecio6,  'cant' => $platocant6, 'Subtotal' => $platosubtotal6,
                        'Sub_desc' => $platosubdesc6, 'Sub_Iva' => $platosubiva6, 'id_reserva' => $idres]
                    );
                    continue;
                }

                //septima comida
                if ($i+6 > $idplatos) {
                    break;
                }else{
                    $platoid7 = $request->get('idcomida')[$i+6];
                    $platonombre7 = $request->get('nombrecomida')[$i+6];
                    $platoprecio7 = $request->get('preciocomida')[$i+6];
                    $platocant7 = $request->get('cant')[$i+6];
                    $platosubtotal7 = $request->get('sub_total')[$i+6];
                    $platosubdesc7 = $request->get('sub_desc')[$i+6];
                    $platosubiva7 = $request->get('sub_iva')[$i+6];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid7, 'precio' => $platoprecio7,  'cant' => $platocant7, 'Subtotal' => $platosubtotal7,
                        'Sub_desc' => $platosubdesc7, 'Sub_Iva' => $platosubiva7, 'id_reserva' => $idres]
                    );
                    continue;
                }

                //octava comida
                if ($i+7 > $idplatos) {
                    break;
                }else{
                    $platoid8 = $request->get('idcomida')[$i+7];
                    $platonombre8 = $request->get('nombrecomida')[$i+7];
                    $platoprecio8 = $request->get('preciocomida')[$i+7];
                    $platocant8 = $request->get('cant')[$i+7];
                    $platosubtotal8 = $request->get('sub_total')[$i+7];
                    $platosubdesc8 = $request->get('sub_desc')[$i+7];
                    $platosubiva8 = $request->get('sub_iva')[$i+7];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid8, 'precio' => $platoprecio8,  'cant' => $platocant8, 'Subtotal' => $platosubtotal8,
                        'Sub_desc' => $platosubdesc8, 'Sub_Iva' => $platosubiva8, 'id_reserva' => $idres]
                    );
                }

                //novena comida
                if ($i+8 > $idplatos) {
                    break;
                }else{
                    $platoid9 = $request->get('idcomida')[$i+8];
                    $platonombre9 = $request->get('nombrecomida')[$i+8];
                    $platoprecio9 = $request->get('preciocomida')[$i+8];
                    $platocant9 = $request->get('cant')[$i+8];
                    $platosubtotal9 = $request->get('sub_total')[$i+8];
                    $platosubdesc9 = $request->get('sub_desc')[$i+8];
                    $platosubiva9 = $request->get('sub_iva')[$i+8];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid9, 'precio' => $platoprecio9,  'cant' => $platocant9, 'Subtotal' => $platosubtotal9,
                        'Sub_desc' => $platosubdesc9, 'Sub_Iva' => $platosubiva9, 'id_reserva' => $idres]
                    );
                    continue;
                }
                //decima comida
                if ($i+9 > $idplatos) {
                    break;
                }else{
                    $platoid10 = $request->get('idcomida')[$i+9];
                    $platonombre10 = $request->get('nombrecomida')[$i+9];
                    $platoprecio10 = $request->get('preciocomida')[$i+9];
                    $platocant10 = $request->get('cant')[$i+9];
                    $platosubtotal10 = $request->get('sub_total')[$i+9];
                    $platosubdesc10 = $request->get('sub_desc')[$i+9];
                    $platosubiva10 = $request->get('sub_iva')[$i+9];
                    //para insertar en BD
                    DB::table('detalle_reserv')->insert(
                        ['id_Plato' => $platoid10, 'precio' => $platoprecio10,  'cant' => $platocant10, 'Subtotal' => $platosubtotal10,
                        'Sub_desc' => $platosubdesc10, 'Sub_Iva' => $platosubiva10, 'id_reserva' => $idres]
                    );
                    continue;
                    return 'aqui';
                }
            }
        }
        
    }
}