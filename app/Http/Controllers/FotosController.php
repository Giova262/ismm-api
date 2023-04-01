<?php

namespace App\Http\Controllers;

use App\Http\Requests\FotoRequest;
use App\Models\Foto;
use App\Models\Persona;
use Illuminate\Http\Request;

class FotosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Foto::orderBy('id', 'desc')->get();
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Foto::find($id);
    }

    public function showByIdPersona($id)
    {
        return Foto::where('id_persona',$id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request)
    {
        $data = $request->validated();
        $fotos = Foto::create($data);
        $resond = [
            "data" => $fotos,
            "mensaje" => 'Foto Creada!',
        ];
        return response($resond, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFotoUpdatePersona(FotoRequest $request)
    {
        $data = $request->validated();
        $foto = Foto::create($data);

        $persona = Persona::find($request->id_persona);
        $persona->foto_url = $request->url;
        $persona->save();

        $resond = [
            "data" => $foto,
            "mensaje" => 'Foto Creada!',
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
    public function update(FotoRequest $request, $id)
    {
        $fotos = Foto::find($id);
        $data = $request->validated();

        $fotos->fill($data);
        $fotos->save();

        $resond = [
            "data" => $fotos,
            "mensaje" => 'Foto Modificada!',
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
        $foto = Foto::find($id);
        $foto->delete();

        $resond = [
            "data" => null,
            "mensaje" => 'Foto Eliminada',
        ];
        return response($resond, 200);
    }
}
