<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Restaurantes;
use PACOS\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->tipo == '0') {
            
            if (auth()->user()->ciudad == null) {
                return redirect('/user/'.auth()->user()->id.'/manage');
            }
            $ciudad = auth()->user()->ciudad;
            
            $sitios = DB::table('restaurantes as rest')
                ->leftjoin('categoria AS cat', 'cat.id', '=', 'rest.categoria')
                ->leftjoin('ciudades AS ciud', 'ciud.id', '=', 'rest.Ciudad')
                ->leftjoin('departamento AS depto', 'depto.id', '=', 'ciud.Departamento')
                ->leftjoin('foto_vid AS fv', 'fv.id', '=', 'rest.FotoPerfil')
                
                ->select('rest.id AS idrest', 'rest.nombre AS namerest', 'rest.Direccion as direccion', 'rest.BarrioVere AS barriovere', 'rest.Ciudad AS ciudad', 'rest.Descripcion AS descripcion', 'cat.id AS idcat', 'cat.Nombre AS catrest', 'ciud.Nombre AS ciudad', 'depto.Nombre AS namedepto', 'fv.Url AS fotoperfil')
                ->where('ciud.id', $ciudad)
                ->get();

            $ciudad = DB::table('ciudades')
                    ->select('id', 'Nombre')
                    ->where('id', $ciudad)
                    ->get();

            $ciudades = DB::table('ciudades')
                ->select('id', 'Nombre')
                ->get();
                
            return view('/panelusuario.view_homeusuario')
                ->with('sitios', $sitios)
                ->with('ciudad', $ciudad)
                ->with('ciudades', $ciudades);
        }
        else{
            $myid = auth()->user()->id;
            //$mispacos['mispacos']=Restaurantes::paginate()->where('id_usuario', $myid);

            $pacosinfo = DB::table('restaurantes as rest')
                    ->leftJoin('horarioxrest as hores', 'hores.idRest', '=', 'rest.id')
                    ->leftJoin('horario as hor', 'hor.id', '=', 'hores.idHor')
                    ->leftJoin('categoria as cat', 'cat.id', '=', 'rest.categoria')
                    ->leftJoin('ciudades as ciu',  'ciu.id', '=', 'rest.Ciudad')
                    ->leftJoin('departamento as dep', 'dep.id', '=', 'ciu.Departamento') 
                    
                    ->select('cat.Nombre AS category', 'rest.id AS idrest', 'rest.nombre', 'rest.Descripcion',
                            'rest.pais', 'ciu.Nombre AS ciudad', 'dep.Nombre AS depto', 
                            'rest.BarrioVere', 'rest.Direccion', 'hor.DIa_Ini as diaopen', 'hor.Dia_cierre as diaclose', 
                            'hor.Hora_APert as horaopen', 'hor.Hora_cierre as horaclose', 'rest.domicilios', 'rest.reservas', 'rest.ordenes', 'rest.id_usuario')
                    ->where('rest.id_usuario', $myid)
                    ->get();

            $sitios = DB::table('restaurantes as rest')
                ->leftjoin('categoria AS cat', 'cat.id', '=', 'rest.categoria')
                ->leftjoin('ciudades AS ciud', 'ciud.id', '=', 'rest.Ciudad')
                ->leftjoin('departamento AS depto', 'depto.id', '=', 'ciud.Departamento')
                ->leftjoin('foto_vid AS fv', 'fv.id', '=', 'rest.FotoPerfil')
                
                ->select('rest.id AS idrest', 'rest.nombre AS nombrepacos', 'rest.Direccion as direccion', 'rest.BarrioVere AS barriovere', 'rest.Ciudad AS ciudad', 'rest.Descripcion AS descripcion', 'cat.id AS idcat', 'cat.Nombre AS catrest', 'ciud.Nombre AS ciudad', 'depto.Nombre AS namedepto', 'fv.Url AS fotoperfil', 'rest.id_usuario')
                ->where('rest.id_usuario', $myid)
                ->get();

            return view('/managepacos/view_pacos')
                    ->with('pacosinfo', $pacosinfo)
                    ->with('sitios', $sitios);
        }
    }

    public function store(Request $request){
        //$ciudad = request()->except('_token');
        
        $ciudad = request()->ciudad;
            
        $sitios = DB::table('restaurantes as rest')
            ->leftjoin('categoria AS cat', 'cat.id', '=', 'rest.categoria')
            ->leftjoin('ciudades AS ciud', 'ciud.id', '=', 'rest.Ciudad')
            ->leftjoin('departamento AS depto', 'depto.id', '=', 'ciud.Departamento')
            ->leftjoin('foto_vid AS fv', 'fv.id', '=', 'rest.FotoPerfil')
            
            ->select('rest.id AS idrest', 'rest.nombre AS namerest', 'rest.Direccion as direccion', 'rest.BarrioVere AS barriovere', 'rest.Ciudad AS ciudad', 'rest.Descripcion AS descripcion', 'cat.id AS idcat', 'cat.Nombre AS catrest', 'ciud.Nombre AS ciudad', 'depto.Nombre AS namedepto', 'fv.Url AS fotoperfil')
            ->where('ciud.Nombre', $ciudad)
            ->get();

        $ciudad = DB::table('ciudades')
                ->select('id', 'Nombre')
                ->where('Nombre', 'like', $ciudad)
                ->get();

        $ciudades = DB::table('ciudades')
                ->select('id', 'Nombre')
                ->get();

        return view('/panelusuario.view_homeusuario')
                ->with('sitios', $sitios)
                ->with('ciudad', $ciudad)
                ->with('ciudades', $ciudades);
    }
        
}
