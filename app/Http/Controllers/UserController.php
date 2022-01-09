<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\UsuarioCollection;
use App\Http\Requests\GuardarUsuarioRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        /*
        return response()->json([
            'error'=>false,
            'response' => $users
           ], 200);*/
           return new UsuarioCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioRequest $request)
    {
        $usuario = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        if(!$usuario){
            return response()->json([
                'error'=>true,
                'menssage' => 'Error al crear un usuario'
            ],400);
        }else{
            return response()->json([
                'error'=>false,
                'response' => $usuario
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
        $usuario=User::find($id);
        if($usuario){
            /*return response()->json([
                'error'=> false,
                'response'=>$usuario
            ], 200);*/
            //return response()->json(new UsuarioResource($usuario), 200);
            return new UsuarioResource($usuario);
            /*ojo hay que corregir por aqui no se te olvide */
        }else{
            return response()->json([
               'error'=>true,
               'menssage'=>"No exite este usuario" 
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
    public function update(Request $request, $id)
    {
        $usuario=User::find($id);
        if(!empty($usuario)){
            $usuario->update($request->all());
            if(!$usuario){
                return response()->json([
                    'error'=>true,
                    'menssage' => 'Error en actualizar los datos'
                   ], 400);
            }else{
                return response()->json([
                    'error'=>false,
                    'response' => $usuario
                ], 200);
            }
        }else{
            return response()->json([
                'error'=>true,
                'menssage' => 'El usuario no existe'
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
        $usuario=User::find($id);
        $usuario->delete();
        if(!$usuario){
            return response()->json([
                'error'=>true,
                'menssage' => 'El usuario no se escuentra registrado'
               ], 404);
        }else{
            return response()->json([
                'error'=>false,
                'menssage' => 'El usuario fue eliminado de la base de datos'
               ], 200);
        }
    }
}
