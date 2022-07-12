<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;

/**
 * Class ExpedienteController
 * @package App\Http\Controllers
 */
class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consumir WebService Rest de Expediente y mostrarlo en la vista
        $expediente=HTTP::get('http://localhost:8000/api/expedientes');
        $expedienteArray=$expediente->json();
        //Consulta de la base de datos para obtener los usuarios donde el rol es 'paciente'
        $pacientes=User::where('rol', 'Paciente')->get();
        $pacientesArray=json_decode(json_encode($pacientes), true);
        //Consulta en la base de datos para obtener los usuarios donde el rol es 'doctor'
        $doctores=User::where('rol', 'Doctor(a)')->get();
        $doctoresArray=json_decode(json_encode($doctores), true);
        //Devuelve la vista con los datos obtenidos
        return view('expediente.index', compact('expedienteArray', 'pacientesArray', 'doctoresArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente = new Expediente();
        $paciente=User::whereIn('rol', ['Paciente'])->pluck('nombre', 'id');
        $doctor=User::whereIn('rol', ['Doctor(a)'])->pluck('nombre', 'id');
        return view('expediente.create', compact('expediente', 'paciente', 'doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Consumir WebService Rest de Expediente
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('POST', 'expedientes', [
            'form_params' => [
                'noExpediente' => $request->noExpediente,
                'idPaciente' => $request->idPaciente,
                'idDoctor' => $request->idDoctor,
                'descripcion' => $request->descripcion,
            ]
        ]);
        //Mostrar mensaje de confirmación de creación de expediente
        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Consumir WebService Rest de Expediente
        $expediente=HTTP::get('http://localhost:8000/api/expedientes/'.$id);
        $expedienteArray=$expediente->json();
        //Consulta de la base de datos para obtener los usuarios donde el rol es 'paciente'
        $pacientes=User::where('rol', 'Paciente')->get();
        $pacientesArray=json_decode(json_encode($pacientes), true);
        //Consulta en la base de datos para obtener los usuarios donde el rol es 'doctor'
        $doctores=User::where('rol', 'Doctor(a)')->get();
        $doctoresArray=json_decode(json_encode($doctores), true);
        //Devuelve la vista con los datos obtenidos
        return view('expediente.show', compact('expedienteArray', 'pacientesArray', 'doctoresArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::find($id);
        $paciente=User::whereIn('rol', ['Paciente'])->pluck('nombre', 'id');
        $doctor=User::whereIn('rol', ['Doctor(a)'])->pluck('nombre', 'id');
        return view('expediente.edit', compact('expediente', 'paciente', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        //Consumir WebService Rest de Expediente
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('PUT', 'expedientes/'.$expediente->id, [
            'form_params' => [
                'noExpediente' => $request->noExpediente,
                'idPaciente' => $request->idPaciente,
                'idDoctor' => $request->idDoctor,
                'descripcion' => $request->descripcion,
            ]
        ]);
        //Mostrar mensaje de confirmación de edición de expediente
        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente actualizado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //Consumir WebService Rest de Expediente
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('DELETE', 'expedientes/'.$id);
        //Mostrar mensaje de confirmación de eliminación de expediente
        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente eliminado con éxito.');
    }
}
