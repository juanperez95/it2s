<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\Nino;
use Illuminate\Http\Request;

class NinoController extends Controller
{
    // metodo get para la tabla de niños
    public function getNinos(){
        return response()->json(Nino::with('acudiente')->take(5)->orderBy('id','desc')->get());
    }

    // Editar al niño 
    public function updateNino(Request $request){
        $nino = Nino::find($request->id);
        $nino->nombre = $request->nombre;
        $nino->salon = $request->salon;
        $nino->edad = $request->edad;
        $nino->genero = $request->genero;
        $nino->acudiente_id = $request->acudiente_id; // Id del acudiente
        $nino->save();
        return response()->json(['update_nino' => true]);
    }

    // Eliminar un niño
    public function deleteNino(Request $request){
        $nino = Nino::find($request->id);
        $nino->delete();
        return response()->json(['delete_nino' => true]);
    }

    // Crear a un niño
    public function createNino(Request $request){
        $nino = new Nino();
        $nino->nombre = $request->nombre;
        $nino->salon = $request->salon;
        $nino->edad = $request->edad;
        $nino->genero = $request->genero;
        $nino->acudiente_id = $request->acudiente_id; // Id del acudiente
        $nino->save(); // Guardar a niño en base de datos
        return response()->json(['create_nino' => true]);
    }

    
}
