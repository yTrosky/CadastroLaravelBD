<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamentos;

class AgendamentosController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'nome' => 'required|max:255',
            'telefone' => 'required|max:20',
            'origem' => 'required|max:255',
            'contato' => 'required|max:255',
            'observacao' => 'required|max:255',

        ]);

        $agendamento = new Agendamentos();
        $agendamento->nome = $request->nome;
        $agendamento->telefone = $request->telefone;
        $agendamento->origem = $request->origem;
        $agendamento->data_contato = $request->contato;
        $agendamento->observacao = $request->observacao;
        $agendamento->save();

        return redirect()->route('index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    public function show(){

        $tableagenda = Agendamentos::all();
        
        return view('consulta', ['agendamentos' => $tableagenda]);
    }
}
