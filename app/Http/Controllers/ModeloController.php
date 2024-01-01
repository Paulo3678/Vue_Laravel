<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
{
    public function __construct(private Modelo $modelo)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = $this->modelo->with('marca')->get();
        return response()->json($modelos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->modelo->rules());
        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store("imagens/modelos", "public");

        $modelo = $this->modelo->create([
            'marca_id' => $request->marca_id,
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
            'numero_portas' => $request->numero_portas,
            'lugares' => $request->lugares,
            'air_bag' => $request->air_bag,
            'abs' => $request->abs,
        ]);
        return response()->json($modelo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $modelo = $this->modelo->with("marca")->find($id);
        if ($modelo === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }
        return response()->json($modelo, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $modelo = $this->modelo->find($id);
        if ($modelo === null) {
            return response()->json(
                ['erro' => 'Impossível realizar a atualização. Recurso pesquisado não existe'],
                404
            );
        }

        if ($request->method() === 'PATCH') {
            $regrasDinamicas = [];

            foreach ($modelo->rules() as $input => $regra) {
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas);
        } else {
            $request->validate($modelo->rules());
        }

        if ($request->file('imagem')) {
            Storage::disk('public')->delete($modelo->imagem);
        }

        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store("imagens/modelos", "public");

        $modelo->fill($request->all());
        $modelo->imagem = $imagem_urn;
        $modelo->save();

        return response()->json($modelo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $modelo = $this->modelo->find($id);
        if ($modelo === null) {
            return response()->json(
                ['erro' => 'Impossível realizar exclusão. Recurso pesquisado não existe'],
                404
            );
        }
        Storage::disk('public')->delete($modelo->imagem);
        $modelo->delete();
        return response()->json(["msg" => "Modelo removida com sucesso"], 200);
    }
}
