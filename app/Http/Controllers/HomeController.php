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
            $sitios = [];
            return view('/panelusuario.view_homeusuario')->with('sitios', $sitios);
        }
        else{
            $myid = auth()->user()->id;
            $mispacos['mispacos']=Restaurantes::paginate()->where('id_usuario', $myid);
            return view('/managepacos/view_pacos', $mispacos);
        }
    }

    public function store(Request $request){
        $ciudad = request()->except('_token');
        
        $sitios = DB::table('restaurantes as rest')
                ->leftjoin('categoria AS cat', 'cat.id', '=', 'rest.categoria')
                ->leftjoin('ciudades AS ciud', 'ciud.id', '=', 'rest.Ciudad')
                ->leftjoin('departamento AS depto', 'depto.id', '=', 'ciud.Departamento')
                ->leftjoin('foto_vid AS fv', 'fv.id', '=', 'rest.FotoPerfil')
                
                ->select('rest.id AS idrest', 'rest.nombre AS namerest', 'rest.Direccion as direccion', 'rest.BarrioVere AS barriovere', 'rest.Ciudad AS ciudad', 'rest.Descripcion AS descripcion', 'cat.id AS idcat', 'cat.Nombre AS catrest', 'ciud.Nombre AS ciudad', 'depto.Nombre AS namedepto', 'fv.Url AS fotoperfil')
                ->where('ciud.Nombre', $ciudad)
                ->get();
        $ciudad = (implode($ciudad));
        return view('/panelusuario.view_homeusuario')->with('sitios', $sitios)->with('ciudad', $ciudad);
    }
        
}
