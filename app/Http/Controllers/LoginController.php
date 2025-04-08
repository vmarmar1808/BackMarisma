<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validamos los datos del request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Si la validación falla, devolvemos un error 422
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Datos de entrada incorrectos',
                'details' => $validator->errors()
            ], 422);
        }

        // Intentamos autenticar al usuario con las credenciales
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            return response()->json([
                'message' => 'Login exitoso',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role
                ]
            ], 200);
        }

        // Si las credenciales son incorrectas, devolvemos un error 401
        return response()->json([
            'error' => 'Credenciales incorrectas',
            'details' => [
                'message' => 'El correo o la contraseña son incorrectos.'
            ]
        ], 401);
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logout exitoso']);
    }

    // Métodos para recuperar contraseña

    public function sendResetLinkEmail(Request $request)
 {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            // Elimina tokens expirados
            PasswordResetToken::where('created_at', '<', now()->subHours(2))->delete();

            // Genera token
            $token = Str::random(60);

            // Guarda el token
            $passwordReset = PasswordResetToken::create([
                'email' => $request->email,
                'token' => $token,
            ]);

            // Envía el correo
            try {
                Mail::send('emails.password-reset', [
                    'token' => $token,
                    'id' => $passwordReset->id // Envía el ID al correo
                ], function ($message) use ($request) {
                    $message->to($request->email)
                        ->subject('Restablecimiento de contraseña');
                });

                return response()->json([
                    'message' => 'Enlace de recuperación enviado.'
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Error al enviar el correo.'
                ], 500);
            }
    }
  

}
