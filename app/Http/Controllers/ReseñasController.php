<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReseñasController extends Controller
{
    public function store(Request $request){
    	$idpacos = request()->idpacos;
    	$namepacos = request()->namepacos;
    	$iduser = request()->iduser;
    	$fecha = request()->fecha;
    	$hora = request()->hora;
    	$reseña = request()->reseña;

        DB::table('reseñas')->insert(
        	['Restaurante' => $idpacos,  'Usuario' => $iduser, 'hora' => $hora, 'fecha' => $fecha, 'reseña' => $reseña]
    	);

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

        $fotos = DB::table('restaurantes as rest')
                ->leftjoin('foto_vid as fv', 'rest.FotoPerfil', '=', 'fv.id')
                ->join('foto_vid as fvp', 'rest.FotoPortada', '=', 'fvp.id')
                ->select('rest.id as resta', 'fv.Url as Perfil', 'fvp.Url as Portada')
                ->where('rest.nombre', $namepacos)
                ->get();
        //reseñas por pacos
        $reseñas = DB::table('reseñas AS rese')
                ->join('users as us', 'us.id', '=', 'rese.Usuario')
                ->join('restaurantes AS rest', 'rest.id', '=', 'rese.Restaurante')
                ->select('rese.id AS idreseña', 'rese.hora', 'rese.fecha', 'rese.reseña',
                        'us.name AS nameuser', 'us.apellidos AS lastnameuser', 'rest.id AS idpacos', 
                        'rest.nombre AS namepacos')
                ->where('rest.nombre', $namepacos)
                ->get();
        return view('pacos.view_reseñas')
                ->with('pacosinfo', $pacosinfo)
                ->with('fotos', $fotos)
                ->with('reseñas', $reseñas);
    }
}
