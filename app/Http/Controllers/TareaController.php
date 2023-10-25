<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = DB::table('tareas')
        ->join('users', 'tareas.codigo_user', '=', 'users.id')
        ->select('tareas.*', 'users.name as user_name')
        ->get();

     return response()->json(['tareas' => $tareas], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos recibidos en la solicitud
            
            
            $request->validate([
                'tarea_titulo' => 'required|string',
                'tarea_descripcion' => 'required|string',
                'codigo_user' => 'required|integer',
                'tarea_estado' => 'nullable|string',

            ]);

            $tarea = New Tarea;
            $tarea->tarea_titulo = $request->tarea_titulo;
            $tarea->tarea_descripcion = $request->tarea_descripcion;
            $tarea->codigo_user = $request->codigo_user;
            $tarea->tarea_estado = $request->tarea_estado;
            $tarea->save();

            // Crear un nuevo cliente con los datos proporcionados en la solicitud
        
            // Retornar el cliente recién creado como respuesta en formato JSON
            return response()->json($tarea, 201);
        } catch (\Exception $e) {
            // En caso de excepción, retornar un mensaje de error en formato JSON
            return response()->json(['error' => 'Error la tarea no se ha creado '. $e], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    //este metodo muestra un tarea especifico
    {
        return $tarea;
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
   
        try {
            // Validar los datos recibidos en la solicitud
            $request->validate([
                'tarea_titulo' => 'string',
                'tarea_descripcion' => 'string',
                'codigo_user' => 'integer',
                'tarea_estado' => 'nullable|string',
                
            ]);
    
            // Actualizar el tarea con los datos proporcionados en la solicitud
            $tarea->tarea_titulo = $request->input('tarea_titulo');
            $tarea->tarea_descripcion = $request->input('tarea_descripcion');
            $tarea->codigo_user = $request->input('codigo_user');
            $tarea->tarea_estado = $request->input('tarea_estado');
            $tarea->save();
    
            return response()->json($tarea, 200);
        } catch (\Exception $e) {
            // En caso de excepción, retornar un mensaje de error en formato JSON
            return response()->json(['error' => 'Error al actualizar el cliente'], 500);
        }



        
    }



  
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
         $tarea->delete();
        // Retornar una respuesta exitosa en formato JSON
        return response()->json(['message' => 'Tarea ha sido eliminado correctamente'], 200);
    }








}
