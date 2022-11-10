<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ong;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class OngController extends Controller
{
    public function create(Request $r)
    {
        return view('pages.site.ong.cadastro');

    }
    
    public function store(Request $request)
    {

        $request->validate(
            [
                "razao_social"                  => 'required|string|max:255',
                "nome_fantasia"                 => 'required|string|max:255',
                "cnpj"                          => 'required|string|max:255',
                "estatuto_social"               => 'required|string|max:255',
                "nome_representante_legal"      => 'required|string|max:255',
                'email_representante_legal'     => 'required|string|email|max:255',
                "telefone_representante_legal"  => 'required',
            ],
            [
                'razao_social.required'                 => "O campo Razação Social é obrigatório",
                'nome_fantasia.required'                => "O campo Nome Fantasia é obrigatório",
                'cnpj.required'                         => "O campo CNPJ é obrigatório",
                'estatuto_social.required'              => "O campo Estatuto Social é obrigatório",
                'nome_representante_legal.required'     => "O campo Nome Representante é obrigatório",
                'email_representante_legal.required'        => "O campo Email é obrigatório",
                'telefone_representante_legal.required' => "O campo Telefone é obrigatório",

            ]
        );

        $ong = Ong::create([
            'razao_social'                  => $request->razao_social,
            'nome_fantasia'                 => $request->nome_fantasia,
            'cnpj'                          => $request->cnpj,
            'estatuto_social'               => $request->estatuto_social,
            'nome_representante_legal'      => $request->nome_representante_legal,
            'email_representante_legal'     => $request->email_representante_legal,
            'telefone_representante_legal'  => $request->telefone_representante_legal,
        ]);

        return redirect()->route("create.ongs")->withSuccess("Ong cadastrada com sucesso");

    }
    
    public function aprovarOngs(Request $r)
    {
        if(Auth::user()->perfil != 'admin')
        {
            return redirect()->route('home');
        }

        $ongs = Ong::where('ativo', 0)->get();

        return view('pages.site.ong.aprovacao_ongs', ['ongs' => $ongs]);
    }

    public function aprovarOng(Request $r)
    {
        $ong = Ong::find($r->id);
        $ong->ativo = 1;
        $ong->save();

        return;
    }
}
