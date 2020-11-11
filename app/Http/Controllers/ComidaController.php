<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use PACOS\Comida;
use Illuminate\Support\Facades\DB;

class ComidaController extends Controller
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

        $fotos = DB::table('restaurantes as rest')
                ->leftjoin('foto_vid as fv', 'rest.FotoPerfil', '=', 'fv.id')
                ->join('foto_vid as fvp', 'rest.FotoPortada', '=', 'fvp.id')
                ->select('rest.id as resta', 'fv.Url as Perfil', 'fvp.Url as Portada')
                ->where('rest.nombre', $namepacos)
                ->get();
        return view('managepacos.view_category')->with('pacosinfo', $pacosinfo)->with('fotos', $fotos);
        
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
        $idcategoria = request()->idcategoria;
        $nombrecomida = request()->nombrecomida;
        $ingredientes = request()->ingredientes;
        $preciocomida = request()->precio;
        
        DB::table('platos')->insert(
                ['Categoria' => $idcategoria,  'Nombre' => $nombrecomida, 'Descripcion' => $ingredientes, 'Precio' => $preciocomida]
            );
        // consultar id de la comida antes guardada para insertarlo en tabla platosxrest
        $comidarecienregistrada = DB::table('platos')->select('id')->where('Categoria', $idcategoria)
                                                    ->latest('id')->limit(1)->get();
        foreach ($comidarecienregistrada as $estacomida) {
            $idcomida = $estacomida->id;
        }
        //insertar en tabla platosxrest id_Rest y id_Plat
        $idpacos = request()->id_pacos;
        DB::table('platosxrest')->insert(
                    ['id_Rest' => $idpacos,  'id_Plat' => $idcomida]
                );
        //insertar foto en la tabla foto_vid con principal 3
        $comidas = request()->except('_token', 'id_pacos', 'idcategoria', 'nombrecategoria', 'nombrecomida', 'ingredientes', 'namepacos', 'categoria', 'precio');
        
        if ($request->hasFile('foto')) {
            $comidas['foto']=$request->file('foto')->store('fotospacos/comidas', 'public');
            $comidas = (implode($comidas));

            DB::table('foto_vid')->insert(
                    ['Url' => $comidas,  'Principal' => '3']
                );
        }
        // consultar id de la foto antes guardada para insertarlo en tabla fotoxplato
        $fotorecienregistrada = DB::table('foto_vid')->select('id')->where('Principal', '3')
                                                    ->latest('id')->limit(1)->get();
        foreach ($fotorecienregistrada as $estafoto) {
            $idfoto = $estafoto->id;
        }
        //insertar en tabla fotoxplato id_FotoVid y id_Plato
        $idpacos = request()->id_pacos;
        DB::table('fotoxplato')->insert(
                    ['id_FotoVid' => $idfoto,  'id_Plato' => $idcomida]
                );
        $namepacos = request()->namepacos;

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
        $category = request()->nombrecategoria;
        $categoriasinfo = DB::table('catplatos AS cp')
                    ->leftJoin('foto_vid AS fv', 'fv.id', '=', 'cp.Foto')
                    ->leftJoin('restaurantes AS rest', 'rest.id', '=', 'cp.id_restaurante')
                    ->select('cp.id AS idcategoria', 'cp.Descripcion AS nombrecategoria', 'fv.id AS idfotocategoria' , 'fv.Url AS fotocategoria')
                    ->where('cp.Descripcion', $category)
                    ->get();
        $idpacos = request()->id_pacos;
        $category = request()->nombrecategoria;
        $querycomidas = DB::table('platos AS pla')
                    ->leftJoin('platosxrest AS plarest', 'plarest.id_Plat','=','pla.id')
                    ->leftJoin('catplatos AS cpla', 'cpla.id','=','pla.Categoria')
                    ->leftJoin('restaurantes AS rest', 'rest.id', '=', 'plarest.id_Rest')
                    ->leftJoin('fotoxplato AS fpla', 'fpla.id_Plato', '=', 'pla.id')
                    ->leftJoin('foto_vid AS fv', 'fv.id', '=', 'fpla.id_FotoVid')

                    ->select('pla.id AS idcomida', 'fv.Url AS fotocomida', 'pla.Nombre AS namecomida', 'pla.Descripcion AS ingredientes', 'pla.Precio AS precio', 'cpla.id AS idcategoria', 'cpla.Descripcion AS namecategoria', 'rest.id AS idpacos', 'rest.nombre AS namepacos')
                    ->where('cpla.Descripcion', $category)
                    ->get();

        return view('managepacos.view_comida')->with('pacosinfo', $pacosinfo)->with('categoriasinfo', $categoriasinfo)->with('querycomidas', $querycomidas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PACOS\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function show(Comida $comida, $namepacos, $category)
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
        $categoriasinfo = DB::table('catplatos AS cp')
                    ->leftJoin('foto_vid AS fv', 'fv.id', '=', 'cp.Foto')
                    ->leftJoin('restaurantes AS rest', 'rest.id', '=', 'cp.id_restaurante')
                    ->select('cp.id AS idcategoria', 'cp.Descripcion AS nombrecategoria', 'fv.id AS idfotocategoria' , 'fv.Url AS fotocategoria')
                    ->where('cp.Descripcion', $category)
                    ->get();
        $querycomidas = DB::table('platos AS pla')
                    ->leftJoin('platosxrest AS plarest', 'plarest.id_Plat','=','pla.id')
                    ->leftJoin('catplatos AS cpla', 'cpla.id','=','pla.Categoria')
                    ->leftJoin('restaurantes AS rest', 'rest.id', '=', 'plarest.id_Rest')
                    ->leftJoin('fotoxplato AS fpla', 'fpla.id_Plato', '=', 'pla.id')
                    ->leftJoin('foto_vid AS fv', 'fv.id', '=', 'fpla.id_FotoVid')

                    ->select('pla.id AS idcomida', 'fv.Url AS fotocomida', 'pla.Nombre AS namecomida', 'pla.Descripcion AS ingredientes', 'pla.Precio AS precio', 'cpla.id AS idcategoria', 'cpla.Descripcion AS namecategoria', 'rest.id AS idpacos', 'rest.nombre AS namepacos')
                    ->where('cpla.Descripcion', $category)
                    ->get();
        
        return view('managepacos.view_comida')
                ->with('pacosinfo', $pacosinfo)
                ->with('categoriasinfo', $categoriasinfo)
                ->with('querycomidas', $querycomidas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PACOS\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function edit(Comida $comida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PACOS\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comida $comida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PACOS\Comida  $comida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comida $comida)
    {
        //
    }



        
}
