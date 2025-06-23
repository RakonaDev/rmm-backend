<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'celular' => 'required|string',
            'email' => 'required|string',
            'mensaje' => 'required|string',
        ]);
        $nombres = $request->nombres;
        $celular = $request->celular;
        $email = $request->email;
        $mensaje = $request->mensaje;
        $correo = new NotificationMail($nombres, $celular, $email, $mensaje);
        // $correo_odontologo = new NotificationDoctor($nombres, $asunto, $celular);
        Mail::to("juancajas1905@gmail.com")->send($correo);
        // Mail::to("anthony10.reyes10@gmail.com")->send($correo_odontologo);
        // Devuelve una respuesta adecuada a React
        return response()->json(['status' => "success"], 200);
    }
}
