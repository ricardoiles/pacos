<?php

namespace PACOS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
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
        $categoriasinfo = DB::table('catplatos AS cp')
        			->leftJoin('foto_vid AS fv', 'fv.id', '=', 'cp.Foto')
        			->leftJoin('restaurantes AS rest', 'rest.id', '=', 'cp.id_restaurante')
        			->select('cp.id AS idcategoria', 'cp.Descripcion AS nombrecategoria', 'fv.id AS idfotocategoria' , 'fv.Url AS fotocategoria')
        			->where('rest.nombre', $namepacos)
        			->get();
        
        return view('managepacos.view_category')->with('pacosinfo', $pacosinfo)->with('categoriasinfo', $categoriasinfo);
        
    }
    public function show($namepacos)
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

        $categoriasinfo = DB::table('catplatos AS cp')
        			->leftJoin('foto_vid AS fv', 'fv.id', '=', 'cp.Foto')
        			->leftJoin('restaurantes AS rest', 'rest.id', '=', 'cp.id_restaurante')
        			->select('cp.id AS idcategoria', 'cp.Descripcion AS nombrecategoria', 'fv.id AS idfotocategoria' , 'fv.Url AS fotocategoria')
        			->where('rest.nombre', $namepacos)
        			->get();
        return view('managepacos.view_category')->with('pacosinfo', $pacosinfo)->with('fotos', $fotos)->with('categoriasinfo', $categoriasinfo);
        
    }
    public function store(Request $request)
    {	
    	//guardar primero la foto en tabla foto_vid con principal 2
    	$fotos=request()->except('_token', 'id_pacos', 'namepacos', 'Descripcion');
    	
        if ($request->hasFile('Foto')) {
            $fotos['Foto']=$request->file('Foto')->store('fotospacos/categorias', 'public');
            $fotos = (implode($fotos));
            
            //almacenar foto en tabla foto_vid
            DB::table('foto_vid')->insert(
            		['Url' => $fotos,  'Principal' => '2']
            	);
        }
        // consultar id de la foto antes guardada para insertarlo en tabla fotosvidlugar
        $fotorecienregistrada = DB::table('foto_vid')->select('id')->where('Principal', '2')
                    								->latest('id')->limit(1)->get();
        foreach ($fotorecienregistrada as $estafoto) {
			$fotocategory = $estafoto->id;
		}
		//recibir dato nombre de la categoria
        $nombrecategory = request()->Descripcion;
        $idpacos = request()->id_pacos;
        //insertar dentro de tabla catplatos
        DB::table('catplatos')->insert(
                ['Descripcion' => $nombrecategory,  'Foto' => $fotocategory, 'id_restaurante' => $idpacos]
            );

        $namepacos = request()->namepacos;
        $idpacos = request()->id_pacos;

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
        			->where('rest.nombre', $namepacos)
        			->get();
        
        return view('managepacos.view_category')->with('pacosinfo', $pacosinfo)->with('categoriasinfo', $categoriasinfo);      
    }
    public function agregar($namepacos)
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
        return view('managepacos.view_agregarcategoria')->with('pacosinfo', $pacosinfo)->with('fotos', $fotos);
        
    }

}
