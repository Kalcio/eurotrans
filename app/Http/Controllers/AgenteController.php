<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Agente;

class AgenteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentes = Agente::all();
        return view('agente.index')->with('agentes', $agentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:200',
            'numero'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:15|unique:agentes',
            'email'=>'required|email|max:200|unique:agentes',
            'direccion'=>'required|max:200',
        ]);

        $agentes = new Agente();

        $agentes->nombre = $request->get('nombre');
        $agentes->numero = $request->get('numero');
        $agentes->email = $request->get('email');
        $agentes->direccion = $request->get('direccion');

        $agentes->save();

        return redirect('/agentes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agente = Agente::find($id);
        return view('agente.edit')->with('agente', $agente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required|max:200',
            'numero'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:15',Rule::unique('agentes')->ignore($id)],
            'email'=>['required','email','max:200',Rule::unique('agentes')->ignore($id)],
            'direccion'=>'required|max:200',
        ]);

        $agente = Agente::find($id);

        $agente->nombre = $request->get('nombre');
        $agente->numero = $request->get('numero');
        $agente->email = $request->get('email');
        $agente->direccion = $request->get('direccion');

        $agente->save();

        return redirect('/agentes');
    }

    public function contar()
    {
        $count = Agente::count();
        return $count;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agente = Agente::find($id);
        $agente->delete();
        return redirect('/agentes')->with('eliminar','ok');
    }
}
