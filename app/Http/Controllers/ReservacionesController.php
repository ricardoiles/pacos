<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Reservaciones;
use Illuminate\Support\Facades\DB;

class ReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($namepacos)
    {
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

        $reservaciones = DB::table('reservas AS reserv')
                ->leftjoin('mesas AS mesas', 'mesas.id', '=', 'reserv.id_Mesa')
                ->leftjoin('restaurantes AS rest', 'rest.id', '=', 'mesas.Restaurante')
                ->select('rest.id AS idrest', 'rest.nombre AS nombrerest', 'reserv.id AS idreserva', 'reserv.Fecha AS fechareserva', 'reserv.Hora_Ini AS horareserva', 'reserv.Detalle_Reserv AS consincomida', 'reserv.id_Usuario AS iduser')
                ->where('rest.nombre', $namepacos)
                ->get();

        $mesasxrest = DB::table('mesas AS mesa')
                ->join('restaurantes AS rest', 'rest.id', '=', 'mesa.Restaurante')
                ->select('mesa.id AS idmesa', 'mesa.numero AS numeromesa', 'mesa.Puestos AS puestosmesa', 'rest.nombre AS nombrerest')
                ->where('rest.nombre', $namepacos)
                ->get();

        return view('pacos.view_reservaciones')
                ->with('pacosinfo', $pacosinfo)
                ->with('redes', $redes)
                ->with('fotos', $fotos)
                ->with('reservaciones', $reservaciones)
                ->with('mesasxrest', $mesasxrest);
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
        $namepacos=request()->namepacos;

        $idrest=request()->idrest;
        $iduser=request()->iduser;
        $mesa=request()->mesa;
        $fecha=request()->fecha;
        $horainicio=request()->horainicio;
        $horafin=request()->horafin;
        $cantpersonas=request()->cantpersonas;
        $infoadicional=request()->infoadicional;
        $valortotal=request()->valortotal;
        $totaldcto=request()->totaldcto;
        $totaliva=request()->totaliva;        
        DB::table('reservas')->insert(
                ['id_Restaurante' => $idrest,  'id_Usuario' => $iduser, 'id_Mesa' => $mesa, 'Fecha' => $fecha, 'Hora_Ini' => $horainicio, 'Hora_Fin' => $horafin, 'Cant_Personas' => $cantpersonas, 'informacionAdc' => $infoadicional, 'total' => $valortotal, 'total_desc' => $totaldcto, 'total_iva' => $totaliva]
            );
        // consultar id de la comida antes guardada para insertarlo en tabla platosxrest
        $reservarecienregistrada = DB::table('reservas AS reserva')
                                ->select('reserva.id AS idreserva', 'reserva.id_Usuario')
                                ->where('reserva.id_Usuario', $iduser)
                                ->latest('id')
                                ->limit(1)
                                ->get();
        foreach ($reservarecienregistrada as $estareserva) {
            $reservacion = $estareserva->idreserva;
        }

        return redirect('/pacos/'.$namepacos.'/'.$reservacion.'/ordenarcomida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservaciones $reservaciones)
    {
        //
    }
}
