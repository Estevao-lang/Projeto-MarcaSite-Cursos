<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    // all books
    public function index()
    {
        $cursos = cursos::all()->toArray();
        return array_reverse($cursos);
    }

    // add book
    public function add(Request $request)
    {
        $cursos = new cursos([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'cel' => $request->cel,
            'type_user' => $request->type_user,
            'course' => $request->course,
            'password' => $request->password



        ]);
        $cursos->save();

        return response()->json('Curso Adicionado com sucesso!');
    }

    // edit book
    public function edit($id)
    {
        $cursos = cursos::find($id);
        return response()->json($cursos);
    }

    // update book
    public function update($id, Request $request)
    {
        $cursos = cursos::find($id);
        $cursos->update($request->all());

        return response()->json('Curso atualizado com sucesso!');
    }

    // delete book
    public function delete($id)
    {
        $cursos = cursos::find($id);
        $cursos->delete();

        return response()->json('Curso deletado com sucesso!');
    }
}