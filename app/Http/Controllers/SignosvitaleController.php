<?php

namespace App\Http\Controllers;

use App\Models\Signosvitale;
use App\Models\Expediente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;

/**
 * Class SignosvitaleController
 * @package App\Http\Controllers
 */
class SignosvitaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consumir WebService Rest de Signos Vitales y mostrarlo en la vista
        $signosvitales=HTTP::get('http://localhost:8000/api/signosvitales');
        $signosvitalesArray=$signosvitales->json();
        //Consulta de la base de datos donde encontremos los expedientes
        $expedientes=Expediente::where('noExpediente', '!=', '0')->get();
        $expedientesArray=json_decode(json_encode($expedientes), true);
        //Devuelve la vista con los datos obtenidos
        return view('signosvitale.index', compact('signosvitalesArray', 'expedientesArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $signosvitale = new Signosvitale();
        $expediente=Expediente::pluck('noExpediente', 'id');
        return view('signosvitale.create', compact('signosvitale', 'expediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Consumir WebService Rest de Signos Vitales con GuuzzleHttp\Client
        $client = new Client(
            [
                'base_uri' => 'http://localhost:8000/api/',
                'timeout'  => 2.0,
            ]
        );
        $response = $client->request('POST', 'signosvitales', [
            'form_params' => [
                'ritmoCardiaco' => $request->ritmoCardiaco,
                'caloriasQuemadas' => $request->caloriasQuemadas,
                'pasosDiarios' => $request->pasosDiarios,
                'distanciaRecorrida' => $request->distanciaRecorrida,
                'idExpediente' => $request->idExpediente,
            ]
        ]);
        //Devuelve la vista con los datos obtenidos
        return redirect()->route('signosvitales.index')->
        with('success', 'Signos Vitales creados con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Consumir WebService Rest de Signos Vitales
        $signosvitales=HTTP::get('http://localhost:8000/api/signosvitales/'.$id);
        $signosvitalesArray=$signosvitales->json();
        $expedientes=Expediente::where ('noExpediente', '!=', '0')->get();
        $expedientesArray=$expedientes->toArray();
        return view('signosvitale.show', compact('signosvitalesArray', 'expedientesArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signosvitale = Signosvitale::find($id);
        $expediente=Expediente::pluck('noExpediente', 'id');
        return view('signosvitale.edit', compact('signosvitale', 'expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Signosvitale $signosvitale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signosvitale $signosvitale)
    {
        //Consumir WebService Rest de Signos Vitales con GuzzleHttp\Client
        $client = new Client(
            [
                'base_uri' => 'http://localhost:8000/api/',
                'timeout'  => 2.0,
            ]
        );
        $response = $client->request('PUT', 'signosvitales/'.$signosvitale->id, [
            'form_params' => [
                'ritmoCardiaco' => $request->ritmoCardiaco,
                'caloriasQuemadas' => $request->caloriasQuemadas,
                'pasosDiarios' => $request->pasosDiarios,
                'distanciaRecorrida' => $request->distanciaRecorrida,
                'idExpediente' => $request->idExpediente,
            ]
        ]);
        //Devuelve la vista con los datos obtenidos
        return redirect()->route('signosvitale.index')->with('success', 'Signos Vitales actualizados con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //Consumir WebService Rest de Signos Vitales con GuzzleHttp\Client
        $client = new Client(
            [
                'base_uri' => 'http://localhost:8000/api/',
                'timeout'  => 2.0,
            ]
        );
        $response = $client->request('DELETE', 'signosvitales/'.$id);
        //Devuelve la vista con los datos obtenidos
        return redirect()->route('signosvitale.index')->with('success', 'Signos Vitales eliminados con éxito');
    }
}
