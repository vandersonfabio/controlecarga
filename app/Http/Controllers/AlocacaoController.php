<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alocacao;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AlocacaoFormRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class AlocacaoController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $alocacoesEncontradas = DB::table('alocacao as a')
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
                    't.descricao as tipoItem',
                    'f.descricao as fabricanteItem',
                    'sit.descricao as situacaoItem'
                )             
                ->where('i.modelo', 'LIKE', "%".$query.'%')
                ->where('i.isActive', 1)
                ->where('a.isActive', 1)
                ->orderBy('a.id', 'desc')
                ->paginate(7);
            
            return view('alocacao.index', [
                "listaAlocacoes" => $alocacoesEncontradas, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        $setores = DB::table('setor')
                        ->where('isActive',1)
                        ->orderBy('descricao', 'asc')
                        ->get();
        $itens = DB::table('item as i')
                        ->join('situacao as s', 'i.idSituacao', '=', 's.id')
                        ->join('tipo_item as t', 'i.idTipo', '=', 't.id')
                        ->join('fabricante as f', 'i.idFabricante', '=', 'f.id')   
                        ->select(
                            'i.id',
                            'i.modelo',
                            'i.numSerie',
                            'i.numTombo',
                            'i.observacoes',
                            'i.isActive',
                            'i.idTipo',
                            'i.idFabricante',
                            'i.idSituacao',
                            't.descricao as descricaoTipo',
                            'f.descricao as descricaoFabricante',
                            's.descricao as descricaoSituacao'
                        )                        
                        ->where('i.isActive', 1)
                        ->where('s.descricao','=','Disponível')
                        ->orderBy('i.numTombo', 'asc')
                        ->get();
        return view("alocacao.create",[
            "setores"=>$setores,
            "itens"=>$itens
        ]);

        



    }

    public function store(AlocacaoFormRequest $request){
        $alocacao = new Alocacao();
        
        $alocacao->dataEntrega = date("d/m/Y");
        $alocacao->idSetor = intval($request->get('idSetor'));
        $alocacao->idItem = intval($request->get('idItem'));
        
        $item = new ItemController();
        $item->alocar($alocacao->idItem);

        $alocacao->save();

        return Redirect::to('alocacao');
    }

    public function show($id){
        return view("alocacao.show", 
            ["alocacao" => Alocacao::findOrFail($id)]);
    }

    public function update($id){
        $alocacao = Alocacao::findOrFail($id);
        

        $alocacao->update();
        return Redirect::to('alocacao');
    }


    public function destroy($id){
        $alocacao = Alocacao::findOrFail($id);
        $alocacao->isActive = 0;
        $alocacao->dataBaixa = date("d/m/Y");
        $alocacao->userBaixa = Auth::user()->email;
        $item = new ItemController();
        $item->desalocar($alocacao->idItem);

        $alocacao->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$fabricante->delete();
        return Redirect::to('alocacao');
    }
}
