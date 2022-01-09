<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SolicitudResource;
use App\Http\Resources\SolicitudCollection;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $idu=Auth::id();
        $user = User::find($idu);
        $solicitud=$user->solicitud;*/
    //$solicitud = Solicitudes::where("users_id", auth()->user()->id)->get();
   // $solicitud = Solicitudes::whereBelongsTo($user)->get();
    //$solicitud = Solicitudes::where("user_id", auth()->user()->id)->get();
     $solicitud = Solicitudes::with('proyecto', 'tarjeta')->where("user_id", auth()->user()->id)->get();
      //$solicitud = SolicitudResource::collection(Solicitudes::with('proyecto','tarjeta')-> where("user_id", auth()->user()->id)->get());
         // return response($solicitud,200);
          // return dd($solicitud);
          return new SolicitudCollection($solicitud);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  'mensaje',
        *   'users_id',
        *   'tarjeta_id',
        *   'proyecto_id',
        */
       $request= $request->all();
       $request['user_id'] = auth()->user()->id;
       $solicitud =  Solicitudes::create($request);
       if($solicitud){
           return response()->json([
               'status' => true,
               'msg'=>'La solicitud se envio correctamente',
               'solicitud' => $solicitud
           ],200);
       }else{
           return response()->json([
               'status' => false,
               'msg'=>'Hubo un error al enviar la solicitud'
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
        $solicitud=Solicitudes::find($id); 
        if(!$solicitud){
            return response()->json([
                 'error'=>true,
                 'menssage' => 'La solicitud no existe'
                ], 401);
         }else{
                return response(new SolicitudResource($solicitud),200);
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
        //
    }
}
