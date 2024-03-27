<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PythonController extends Controller
{
    public function ejecutarPython(Request $request)
    {
        $datos = $request->except('_token');
        //dd($datos);
        $response = Http::post('http://10.1.4.208:8080', [
            'body' => json_encode($datos),
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        if ($response->successful()) {
            $resultado = $response->json();
            //dd($resultado);
            return redirect()->back()->with($resultado['type'], $resultado['mensaje']);
        } else {
            return redirect()->back()->with('error', 'Error al procesar los datos');
        }
    }
}