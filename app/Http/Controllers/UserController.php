<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Mostrar todos los usuarios
    public function index()
    {
        return User::all();
    }

    // Actualizar un usuario
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }
    
    // Eliminar un usuario
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }

    

}
