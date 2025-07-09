<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;

class AcudienteController extends Controller
{
    // mostrar a los acudiente
    public function getAcudientes(Request $request){
        $acudientes = Acudiente::all();
        return response()->json($acudientes); // Devolver json
    }

    // Funcion para editar el acudiente
    public function updateAcudiente(Request $request){
        $acudiente = Acudiente::find($request->id);
        $acudiente->nombre = $request->nombre;
        $acudiente->genero = $request->genero;
        $acudiente->save();
        return response()->json(['update_acudiente' => 'El acudiente se ha actualizado correctamente']);
    }

    // Funcion para eliminar el acudiente
    public function deleteAcudiente(Request $request){
        $acudiente = Acudiente::find($request->id);
        $acudiente->delete();
        return response()->json(['delete_acudiente' => 'El acudiente se ha eliminado correctamente']);
    }
}
