<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CadUser; // Adicione esta linha de importação para a classe CadUser

class SistemaController extends Controller
{
    public function CadAlunos()
    {
        return inertia('Cadastros/CadAlunos');
    }

    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'instituicao' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:cad_users',
        ]);

        // Cria um novo registro no banco de dados com os dados validados
        CadUser::create($validatedData);

        // Redireciona para a lista de usuários cadastrados ou outra página adequada
        return redirect()->route('CadAlunos')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
