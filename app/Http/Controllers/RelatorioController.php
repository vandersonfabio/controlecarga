<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Setor;
use App\Policial;
use DB;

class RelatorioController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){            
            $setoresEncontrados = DB::table('setor as s')
                ->join('policial as pol', 's.idResponsavel', '=', 'pol.id')
                ->join('posto as p', 'pol.idPosto', '=', 'p.id')
                ->join('alocacao as a', 'a.idSetor', '=', 's.id')
                ->select(
                    's.id',
                    's.descricao',
                    's.isActive',
                    's.idResponsavel',
                    'p.descricao as descricaoPostoResponsavel',
                    'p.sigla as siglaPostoResponsavel',
                    'pol.nomeFuncional as nomeFuncionalResponsavel'
                )              
                ->where('a.isActive', 1)
                ->orderBy('s.descricao','asc')
                ->distinct()
                ->paginate(7);
            
            return view('relatorio.index', [
                "listaSetores" => $setoresEncontrados                
            ]);
        }
    }

    public function show($id){
        return view("relatorio.show", [
            "setor" => Setor::findOrFail($id)
            ]);
    }

    public function edit($idSetor){

        $setor = Setor::findOrFail($idSetor);

        $policial = Policial::findOrFail($setor->idResponsavel);

        $alocacoes = DB::table('alocacao as a')
                ->join('setor as s', 'a.idSetor', '=', 's.id')
                ->join('item as i', 'a.idItem', '=', 'i.id')
                ->join('tipo_item as t', 'i.idTipo', '=', 't.id')
                ->join('fabricante as f', 'i.idFabricante', '=', 'f.id')
                ->join('situacao as sit', 'i.idSituacao', '=', 'sit.id')
                ->select(
                    'a.id',
                    'a.idSetor',
                    'a.idItem',
                    'a.dataEntrega',
                    'a.dataBaixa',
                    'a.userBaixa',
                    'a.isActive',
                    's.descricao as descricaoSetor',
                    'i.modelo as modeloItem',
                    'i.numSerie as numSerieItem',
                    'i.numTombo as numTomboItem',
                    'i.observacoes as obsItem',
                    't.descricao as tipoItem',
                    'f.descricao as fabricanteItem',
                    'sit.descricao as situacaoItem'
                )        
                ->where('a.idSetor', '=', $idSetor)
                ->where('a.isActive', 1)
                ->orderBy('a.id', 'asc')
                ->paginate(10);
    
        return view('relatorio.edit', [
            "listaAlocacoes" => $alocacoes,
            'setor' => $setor,
            'responsavel' => $policial
        ]);
    }
}
