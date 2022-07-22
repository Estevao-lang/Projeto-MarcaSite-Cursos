<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\inscricao;
use Illuminate\Http\Request;

class inscricaoController extends Controller
{
    // all books
    public function index()
    {
        $inscricao = inscricao::all()->toArray();
        return array_reverse($inscricao);
    }

    // add inscricao
    public function add(Request $request)
    {
        $inscricao = new inscricao([
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'upload' => $request->upload


        ]);
        $inscricao->save();

        return response()->json('Inscrição Adicionado com sucesso!');
    }

    // edit inscricao
    public function edit($id)
    {
        $inscricao = inscricao::find($id);
        return response()->json($inscricao);
    }

    // update inscricao
    public function update($id, Request $request)
    {
        $inscricao = inscricao::find($id);
        $inscricao->update($request->all());

        return response()->json('Inscrição atualizado com sucesso!');
    }

    // delete inscricao
    public function delete($id)
    {
        $cursos = inscricao::find($id);
        $cursos->delete();

        return response()->json('Inscrição deletado com sucesso!');
    }
}