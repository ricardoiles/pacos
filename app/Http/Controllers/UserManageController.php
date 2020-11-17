<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManageController extends Controller
{
    public function manage($iduser){
    	$users = DB::table('users')
                ->select('id', 'name', 'apellidos', 'direccion', 'email', 'contrasena', 'password', 'telefono', 'ciudad')
                ->where('id', $iduser)
                ->get();
        $city = DB::table('ciudades')->get();
    	return view('panelusuario.view_usermanage')->with('users', $users)->with('city', $city);
    }
    public function store(Request $request){
    	
    	$iduser = request()->id_usuario;
    	$nombres = request()->nombres;
    	$apellidos = request()->apellidos;
    	$email = request()->email;
    	$contraseña = request()->contraseña;
    	$telefono = request()->telefono;
    	$ciudad = request()->ciudad;

		DB::table('users')
            ->where('id', $iduser)
            ->update(['name' => $nombres, 'apellidos' => $apellidos, 'email' => $email, 'contrasena' => $contraseña,
            		'password' => Hash::make($contraseña), 'telefono' => $telefono, 'ciudad' => $ciudad]);
        //
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

        return view('/panelusuario.view_homeusuario')->with('sitios', $sitios)->with('ciudad', $ciudad);
        
    }
}
