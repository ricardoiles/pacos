<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Restaurantes;
use PACOS\Http\Controllers\Auth;

use Illuminate\Support\Facades\Crypt;

class RestaurantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpacos)
    {
        $nombresitio = auth()->user()->id;

        if ($idpacos==$nombresitio) {
            $datos['datos']=Restaurantes::paginate();
            return view('managepacos.view_managepacos', compact($datos));
        }else {
            return view('errors.404');
        }
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
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurantes $restaurantes)
    {
        $myid = auth()->user()->id;

        //$mispacos['mispacos']=Restaurantes::paginate()->where('id_usuario', $myid);
        $mispacos['mispacos']=Restaurantes::paginate();
        
        if(empty( $mispacos )) {
            return 'La consulta esta vacia';
        }else{
            
            return view('/managepacos/view_pacos', compact($mispacos));
        }
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurantes $restaurantes)
    {
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurantes $restaurantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurantes $restaurantes)
    {
        //
    }
}
