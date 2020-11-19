<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Restaurantes;
use Illuminate\Support\Facades\DB;

class PacosReservacionesController extends Controller
{
    public function index($namepacos, $idpacos)
    {

        $idadminpacos = auth()->user()->id;
        //buscar admin en restaruante
        //$pacosinfo['pacosinfo']=Restaurantes::paginate()->where('nombre', $namepacos);

        $pacosinfo = DB::table('restaurantes as rest')
                    ->leftJoin('horarioxrest as hores', 'hores.idRest', '=', 'rest.id')
                    ->leftJoin('horario as hor', 'hor.id', '=', 'hores.idHor')
                    ->leftJoin('categoria as cat', 'cat.id', '=', 'rest.categoria')
                    ->leftJoin('ciudades as ciu',  'ciu.id', '=', 'rest.Ciudad')
                    ->leftJoin('departamento as dep', 'dep.id', '=', 'ciu.Departamento') 
                    
                    ->select('cat.Nombre AS category', 'rest.id AS idrest', 'rest.nombre', 'rest.Descripcion',
                            'rest.pais', 'ciu.Nombre AS ciudad', 'dep.Nombre AS depto', 
                            'rest.BarrioVere', 'rest.Direccion', 'hor.DIa_Ini as diaopen', 'hor.Dia_cierre as diaclose', 
                            'hor.Hora_APert as horaopen', 'hor.Hora_cierre as horaclose', 'rest.domicilios', 'rest.reservas', 'rest.ordenes', 'tipo_restaurante as tipopacos')
                    ->where('rest.nombre', $namepacos)
                    ->get();

        //reservaciones hechas
        $reservaciones = DB::table('reservas AS reserv')
                ->leftjoin('mesas AS mesas', 'mesas.id', '=', 'reserv.id_Mesa')
                ->leftjoin('restaurantes AS rest', 'rest.id', '=', 'mesas.Restaurante')
                ->select('rest.id AS idrest', 'rest.nombre AS nombrerest', 'reserv.id AS idreserva', 'reserv.Fecha AS fechareserva', 'reserv.Hora_Ini AS horareserva', 'reserv.Detalle_Reserv AS consincomida', 'reserv.id_Usuario AS iduser', 'reserv.total', 'reserv.pagado')
                ->where('rest.nombre', $namepacos)
                ->get();

        $fotos = DB::table('restaurantes as rest')
                ->leftjoin('foto_vid as fv', 'rest.FotoPerfil', '=', 'fv.id')
                ->join('foto_vid as fvp', 'rest.FotoPortada', '=', 'fvp.id')
                ->select('rest.id as resta', 'fv.Url as Perfil', 'fvp.Url as Portada')
                ->where('rest.nombre', $namepacos)
                ->get();

        $reservasxpacos = DB::table('reservas as res')
                ->select('id as idreserva', 'id_Restaurante', 'pagado')
                ->where('pagado', '0')
                ->where(function ($query) use($idpacos) {
                    $query->where('id_Restaurante', '=', $idpacos);
                })
                ->get();

		$cantreservas = count(collect($reservasxpacos));
        
        return view('managepacos.view_pacosreservas')
        		->with('pacosinfo', $pacosinfo)
        		->with('reservaciones', $reservaciones)
        		->with('fotos', $fotos)
        		->with('cantreservas', $cantreservas);
    }
    public function reservasPacos($idpacos){
    	$reservasxpacos = DB::table('reservas as res')
                ->select('id as idreserva', 'id_Restaurante')
                ->where('id_Restaurante', $idpacos)
                ->get();
		return $cantreservas = count(collect($reservasxpacos));
    }
}
