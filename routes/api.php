<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;

Route::post('/usuario', function (Request $request) {

    $request->validate([
        'nome' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'senha' => 'required|string|min:6',
        'perfil_nome' => 'required|string'
    ]);

    // Criar perfil primeiro
    $perfil = Profile::create([
        'perfil_nome' => $request->perfil_nome
    ]);

    // Criar usuário vinculado ao perfil
    $usuario = User::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'senha' => $request->senha,
        'id_perfil' => $perfil->id
    ]);

    return response()->json([
        'status' => 201,
        'message' => 'Usuário criado com sucesso!',
        'usuario' => $usuario->load('perfil')
    ], 201);
});


Route::get('/usuario', function () {

    $usuarios = User::with('perfil')->get();

    return response()->json([
        'status' => 200,
        'usuarios' => $usuarios
    ]);
});


Route::get('/usuario/{id}', function ($id) {

    $usuario = User::with('perfil')->find($id);

    if (!$usuario) {
        return response()->json([
            'status' => 404,
            'message' => 'Usuário não encontrado'
        ], 404);
    }

    return response()->json([
        'status' => 200,
        'usuario' => $usuario
    ]);
});


Route::put('/usuario/{id}', function (Request $request, $id) {

    $usuario = User::find($id);

    if (!$usuario) {
        return response()->json([
            'status' => 404,
            'message' => 'Usuário não encontrado'
        ], 404);
    }

    $request->validate([
        'nome' => 'sometimes|string',
        'email' => 'sometimes|email|unique:users,email,' . $id,
        'senha' => 'sometimes|string|min:6'
    ]);

    $usuario->update($request->only(['nome', 'email', 'senha']));

    return response()->json([
        'status' => 200,
        'message' => 'Usuário atualizado com sucesso',
        'usuario' => $usuario->load('perfil')
    ]);
});


Route::delete('/usuario/{id}', function ($id) {

    $usuario = User::find($id);

    if (!$usuario) {
        return response()->json([
            'status' => 404,
            'message' => 'Usuário não encontrado'
        ], 404);
    }

    $usuario->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Usuário deletado com sucesso'
    ]);
});