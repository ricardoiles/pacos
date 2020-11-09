<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Restaurantes;
use PACOS\Http\Controllers\Auth;


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
            return view('/panelusuario.view_homeusuario');
        }
        else{
            $myid = auth()->user()->id;

            $mispacos['mispacos']=Restaurantes::paginate()->where('id_usuario', $myid);
            return view('/managepacos/view_pacos', $mispacos);
        }
        
    }
}
