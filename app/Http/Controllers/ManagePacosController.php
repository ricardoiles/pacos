<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\ManagePacos;
use Illuminate\Support\Facades\DB;
use PACOS\RelacionFotosxRest;
use PACOS\Restaurantes;
use PACOS\HorarioPacos;
use PACOS\horarioxrest;
use PACOS\RedesPacos;

class ManagePacosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($namepacos)
    {
        $idadminpacos = auth()->user()->id;
        //buscar admin en restaruante
        $pacosinfo['pacosinfo']=Restaurantes::paginate()->where('nombre', $namepacos);
        
        return view('managepacos.view_managepacos', $pacosinfo);
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
        //Guardar fotos
        $fotos=request()->except('_token', 'id_pacos');
        if ($request->hasFile('Url')) {

            $fotos['Url']=$request->file('Url')->store('fotospacos', 'public');
            //return response()->json($fotos);
            //insertar url foto y campo principal 0: perfil 1:cover
        
            //id solo del pacos para insertarlo mas abajo
            $id_pacos=request()->id_pacos;
            $Principal=request()->Principal;
            //almacenar foto en storage
            ManagePacos::insert($fotos);


            //consultar id de la foto antes guardada para insertarlo en tabla fotosvidlugar
            $fotorecienregistrada['foto']=ManagePacos::paginate()->where('id')->last();
            $idfotoguardada = json_decode(array_shift($fotorecienregistrada));
            //id de la foto recien guardada
            $estafoto = $idfotoguardada->id;
            
            //insertar dentro de tabla restaurantes en el campo FotoPerfil el id de la foto recien guardada
            //if para ver si es foto portada o foto perfil
            if ($Principal == 0) {
                $fotoperfilportada = DB::table('restaurantes')
                  ->where('id', $id_pacos)
                  ->update(['FotoPerfil' => $estafoto]);
            }
            if ($Principal == 1) {
                $fotoperfilportada = DB::table('restaurantes')
                  ->where('id', $id_pacos)
                  ->update(['FotoPortada' => $estafoto]);
            }
            //hacer un arreglo con los dos datos a insertar enseguida 1: estafoto 2:id_pacos
            $fotosvidlugar=['idRest' => $id_pacos, 'id_Foto' =>$estafoto];
            //return $fotosvidlugar;
            //insertar dentro de tabla fotosvidlugar
            RelacionFotosxRest::insert($fotosvidlugar);
        }
        $fotos=request()->except('_token');
        if (request()->eshorario == 'eshorario') {
            $horario=request()->except('_token', 'eshorario');
            //recibir horario del formulario
            
            //insertarlo en tabla horario
            HorarioPacos::insert($horario);
            //consultar id del horario antes guardado para insertarlo en tabla horarioxrest 
            $horariorecienregistrado['horario']=HorarioPacos::paginate()->where('id')->last();
            $idhorarioguardado = json_decode(array_shift($horariorecienregistrado));
            //id del horario recien guardado //tambien insertar id rest: id_pacos y id_hora en tabla
            $estehorario = $idhorarioguardado->id;
            $id_pacos=request()->id_pacos;
            //hacer un arreglo con los dos datos a insertar enseguida 1: estehorario 2:id_pacos
            $horarioxrest=['idRest' => $id_pacos, 'idHor' =>$estehorario];
            
            //insertar dentro de tabla fotosvidlugar
            horarioxrest::insert($horarioxrest);
        }
        if (request()->sonredes == 'sonredes') {
            $redes=request()->except('_token', 'sonredes', 'namepacos');
            $namepacos=request()->namepacos;
            $idpacos=request()->id_pacos;

            if ($facebook=request()->facebook ) {
                $redfacebook=request()->facebook;
                //insertar en tabla redes
                DB::table('redes')->insert(
                    ['Url' => $facebook, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174848.svg', 'Tipo' => '1', 'id_restaurante' => $idpacos]
                ); 
                //consultar a red insertada antes
                $queryfacebook = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '1')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($queryfacebook as $qfacebook) {
                    $facebook = $qfacebook->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $facebook]
                ); 
            }
            if ($whastapp=request()->whastapp ) {
                $redwhatsapp=request()->whatsapp;
                
                DB::table('redes')->insert(
                    ['Url' => $whastapp, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174879.svg', 'Tipo' => '2', 'id_restaurante' => $idpacos]
                );
                //consultar a red insertada antes
                $querywhatsapp = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '2')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($querywhatsapp as $qwhatsapp) {
                    $whatsapp = $qwhatsapp->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $whatsapp]
                ); 
            }
            if ($twitter=request()->twitter ) {
                $redtwitter=request()->twitter;

                //RedesPacos::insert($redfacebook);
                DB::table('redes')->insert(
                    ['Url' => $twitter, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174876.svg', 'Tipo' => '3', 'id_restaurante' => $idpacos]
                );

                //consultar a red insertada antes
                $querytwitter = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '3')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($querytwitter as $qtwitter) {
                    $twitter = $qtwitter->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $twitter]
                ); 
            }

            if ($instagram=request()->instagram ) {
                $redinstagram=request()->instagram;

                //RedesPacos::insert($redfacebook);
                DB::table('redes')->insert(
                    ['Url' => $instagram, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174855.svg', 'Tipo' => '4', 'id_restaurante' => $idpacos]
                );

                //consultar a red insertada antes
                $queryinstagram = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '4')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($queryinstagram as $qinstagram) {
                    $instagram = $qinstagram->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $instagram]
                ); 
            }
            if ($sitioweb=request()->sitioweb ) {
                $redsitioweb=request()->sitioweb;

                //RedesPacos::insert($redfacebook);
                DB::table('redes')->insert(
                    ['Url' => $sitioweb, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174844.svg', 'Tipo' => '5', 'id_restaurante' => $idpacos]
                );

                //consultar a red insertada antes
                $querysitioweb = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '5')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($querysitioweb as $qsitioweb) {
                    $sitioweb = $qsitioweb->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $sitioweb]
                ); 
            }
            if ($youtube=request()->youtube ) {
                $redyoutube=request()->youtube;

                //RedesPacos::insert($redfacebook);
                DB::table('redes')->insert(
                    ['Url' => $youtube, 'Icono' => 'https://www.flaticon.es/svg/static/icons/svg/174/174883.svg', 'Tipo' => '6', 'id_restaurante' => $idpacos]
                );

                //consultar a red insertada antes
                $queryyoutube = DB::table('redes')
                        ->select('id')
                        ->where('Tipo', '6')
                        ->latest('id')
                        ->limit(1)
                        ->get();
                
                foreach ($queryyoutube as $qyoutube) {
                    $youtube = $qyoutube->id;
                }
                //insertar en tabla redesxrest
                DB::table('redesxrest')->insert(
                    ['id_Rest' => $idpacos, 'id_Redes' => $youtube]
                ); 
            }
            //consultar y enviar para volver aqui cuando se almacene
            return redirect('/pacos/'.$namepacos);
        }
        

        //consultar y enviar para volver aqui cuando se almacene
        $id_pacos=request()->id_pacos;
        $pacosinfo['pacosinfo']=Restaurantes::paginate()->where('id', $id_pacos);
        return view('managepacos.view_managepacos', $pacosinfo);



    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\ManagePacos  $managePacos
     * @return \Illuminate\Http\Response
     */
    public function show(ManagePacos $managePacos)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\ManagePacos  $managePacos
     * @return \Illuminate\Http\Response
     */
    public function edit(ManagePacos $managePacos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\ManagePacos  $managePacos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagePacos $managePacos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\ManagePacos  $managePacos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagePacos $managePacos)
    {
        //
    }
}
