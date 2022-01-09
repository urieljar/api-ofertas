<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use Illuminate\Http\Request;
use App\Http\Resources\TarjetaResource;
use App\Http\Resources\TarjetaCollection;
use App\Http\Requests\GuardarTarjetaRequest;
use Illuminate\Support\Facades\DB;
class TarjetaController extends Controller
{
    /**
     *Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $sql = 'SELECT * FROM tarjetas';
        $tarjeta = DB::select($sql);
        //$tarjeta=DB::table('tarjetas')->get();
       // $tarjeta=Tarjeta::all();
       /* return response()->json([
            'error'=>false,
            'response' => $tarjeta
           ], 200);*/
          // return new TarjetaCollection($tarjeta);
          return $tarjeta;
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarTarjetaRequest $request)
    {
        $tarjeta=Tarjeta::create($request->all());
        if($tarjeta){
            return response()->json([
                'error'=>false,
                'response' => $tarjeta
               ], 200);
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
        $tarjeta=Tarjeta::find($id);
        if($tarjeta){
            /*return response()->json([
                'error'=> false,
                'response'=>$tarjeta
            ], 200);*/
            /*ojo hay que corregir por aqui no se te olvide */
            //return new TarjetaResource($tarjeta);
            return (new TarjetaResource($tarjeta))->additional([
                'version' => "1.0.0",
                'autor' => "Etni Uriel",
               // 'author_url' => url('http://google.com')
            ]);
        }else{
            return response()->json([
               'error'=>true,
               'menssage'=>"No exite esta tarjeta" 
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
    public function update( Request $request, $id)
    {

        $tarjeta=Tarjeta::find($id);
        if(!empty($tarjeta)){
            $tarjeta->update($request->all());
            if(!$tarjeta){
                return response()->json([
                    'error'=>true,
                    'menssage' => 'Error en actualizar los datos'
                   ], 400);
            }else{
                return response()->json([
                    'error'=>false,
                    'response' => $tarjeta
                ], 200);
            }
        }else{
            return response()->json([
                'error'=>true,
                'menssage' => 'La Tarjeta no existe'
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
        $tarjeta=Tarjeta::find($id);
        $tarjeta->delete();
        if(!$tarjeta){
            return response()->json([
                'error'=>true,
                'menssage' => 'La tarjeta no se escuentra registrado'
               ], 404);
        }else{
            return response()->json([
                'error'=>false,
                'menssage' => 'La tarjeta fue eliminado de la base de datos'
               ], 200);
        }
    }
}
