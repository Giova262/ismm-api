<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::orderBy('id', 'desc')->get();
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Persona::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        $data = $request->validated();
        $persona = Persona::create($data);
        $resond = [
            "data" => $persona,
            "mensaje" => 'Persona Creada!',
        ];
        return response($resond, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaRequest $request, $id)
    {
        $persona = Persona::find($id);
        $data = $request->validated();

        $persona->fill($data);
        $persona->save();

        $resond = [
            "data" => $persona,
            "mensaje" => 'Persona Modificada!',
        ];
        return response($resond, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        $resond = [
            "data" => null,
            "mensaje" => 'Persona Eliminado',
        ];
        return response($resond, 200);
    }
}
