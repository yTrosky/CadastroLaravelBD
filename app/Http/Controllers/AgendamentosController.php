<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamentos;

class AgendamentosController extends Controller
{
    // Método post para validar e enviar os dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Variável para armazenar os dados enviados pelos campos
            'nome' => 'required|max:255',
            'telefone' => 'required|max:20',
            'origem' => 'required|max:255',
            'contato' => 'required|max:255',
            'observacao' => 'required|max:255',

        ]);

            // Enviando os dados para o banco de dados
        $agendamento = new Agendamentos();
        $agendamento->nome = $request->nome;
        $agendamento->telefone = $request->telefone;
        $agendamento->origem = $request->origem;
        $agendamento->data_contato = $request->contato;
        $agendamento->observacao = $request->observacao;
        $agendamento->save();

            // Retornando para o formulário de cadastro
        return redirect()->route('index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    // Método get para mostrar os dados na tabela
    public function show(){

        // Recupera todos os agendamentos do banco de dados
        $tableagenda = Agendamentos::all();
        
        // Retorna a view 'consultar' com os agendamentos recuperados
        return view('consulta', ['agendamentos' => $tableagenda]);
    }
}
