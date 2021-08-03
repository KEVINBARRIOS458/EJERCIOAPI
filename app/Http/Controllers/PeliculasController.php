<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeliculasRequest;
use App\Http\Requests\UpdatePeliculasRequest;
use App\Models\Peliculas;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;
use Psy\Util\Str;
use function GuzzleHttp\Promise\all;
use function Sodium\add;

class PeliculasController extends Controller
{
    //GET listar registros
    public function index(Request $request)

    {
        //
       if ($request->has('txtBuscar'))
       {
           $peliculas = Peliculas::where('nombre', 'like', '%' . $request->txtBuscar .'%')
               ->orWhere('categorias', $request->txtBuscar)
               ->get();
       }
       else
       {
           $peliculas = Peliculas::all();
       }
        return $peliculas;
    }

     // POST insertar los datos
    public function store(Request $request)
    {
        $input = $request->all();
        Peliculas::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente',
        ], 200);
    }




    //GET returna un solo registro
    public function show(Peliculas $pelicula)
    {
        return $pelicula;
    }

    //PUT actualizar registros
    public function update(UpdatePeliculasRequest $request, Peliculas $peliculas)

    {
        $input = $request->all();
        $peliculas->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    //Borrar datos
    public function destroy($id)
    {
        Peliculas::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Pelicula Eliminada Exitosamente'
        ],  200);
    }
}
