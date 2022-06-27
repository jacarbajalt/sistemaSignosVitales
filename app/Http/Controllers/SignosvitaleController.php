<?php

namespace App\Http\Controllers;

use App\Models\Signosvitale;
use App\Models\Expediente;
use Illuminate\Http\Request;

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
        $signosvitales = Signosvitale::paginate();

        return view('signosvitale.index', compact('signosvitales'))
            ->with('i', (request()->input('page', 1) - 1) * $signosvitales->perPage());
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
        request()->validate(Signosvitale::$rules);

        $signosvitale = Signosvitale::create($request->all());

        return redirect()->route('signosvitales.index')
            ->with('success', 'Signosvitale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $signosvitale = Signosvitale::find($id);

        return view('signosvitale.show', compact('signosvitale'));
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
        request()->validate(Signosvitale::$rules);

        $signosvitale->update($request->all());

        return redirect()->route('signosvitales.index')
            ->with('success', 'Signosvitale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $signosvitale = Signosvitale::find($id)->delete();

        return redirect()->route('signosvitales.index')
            ->with('success', 'Signosvitale deleted successfully');
    }
}
