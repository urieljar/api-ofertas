<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Http\Resources\ProyectoResource;
use App\Http\Resources\ProyectoCollection;
use App\Http\Requests\GuardarProyectoRequest;
use Illuminate\Support\Facades\DB;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $proyecto=Proyecto::all()->keyBy->id;
        $proyecto = DB::select('SELECT * FROM proyectos');
        return $proyecto;
      /*  return response()->json([
            'ok'=>true,
            'data' => $proyecto
           ], 200);*/
          //return new ProyectoCollection($proyecto);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarProyectoRequest $request)
    {
        $proyecto=Proyecto::create($request->all());
        if($proyecto){
            return response()->json([
                'error'=>false,
                'response'=>$proyecto
            ],200);
        }else{
            return response()->json([
                'error'=>true,
                'menssage'=> 'Error al crear un proyecto'
            ],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto=Proyecto::find($id);
        if($proyecto){
            /*return response()->json([
                'error'=> false,
                'response'=>$proyecto
            ], 200);*/
            return new ProyectoResource($proyecto);
        }else{
            return response()->json([
               'error'=>true,
               'menssage'=>"No exite este proyecto" 
            ],400);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarProyectoRequest $request, $id)
    {
         //$articulo=Articulos::findOrFail($id);
         $proyecto=Proyecto::find($id);
         if(!empty($proyecto)){
             $proyecto->update($request->all());
             if(!$proyecto){
                 return response()->json([
                     'error'=>true,
                     'menssage' => 'Error en actualizar los datos'
                    ], 400);
             }else{
                 return response()->json([
                     'error'=>false,
                     'response' => $proyecto
                 ], 200);
             }
         }else{
             return response()->json([
                 'error'=>true,
                 'menssage' => 'El proyecto no existe'
                ], 404);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto=Proyecto::find($id);
        $proyecto->delete();
        if(!$proyecto){
            return response()->json([
                'error'=>true,
                'menssage' => 'El proyecto no se escuentra registrado'
               ], 404);
        }else{
            return response()->json([
                'error'=>false,
                'menssage' => 'El proyecto fue eliminado de la base de datos'
               ], 200);
        }
    }
}
