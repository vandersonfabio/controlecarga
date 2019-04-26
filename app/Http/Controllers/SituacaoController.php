<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Situacao;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SituacaoFormRequest;
use DB;

class SituacaoController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $situacoesEncontradas = DB::table('situacao')
                ->where('descricao', 'LIKE', $query.'%')
                ->where('isActive', 1)
                ->orderBy('id', 'asc')
                ->paginate(7);
            
            return view('item.situacao.index', [
                "listaSituacoes" => $situacoesEncontradas, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        return view("item.situacao.create");
    }

    public function store(SituacaoFormRequest $request){
        $situacao = new Situacao;
        $situacao->descricao = $request->get('descricao');
        $situacao->save();

        return Redirect::to('item/situacao');
    }

    public function show($id){
        return view("item.situacao.show", 
            ["situacao" => Situacao::findOrFail($id)]);
    }

    public function edit($id){
        return view("item.situacao.edit", 
            ["situacao" => Situacao::findOrFail($id)]);
    }

    public function update(SituacaoFormRequest $request, $id){
        $situacao = Situacao::findOrFail($id);
        $situacao->descricao = $request->get('descricao');
        $situacao->update();
        return Redirect::to('item/situacao');
    }

    public function destroy($id){
        $situacao = Situacao::findOrFail($id);
        $situacao->isActive = 0;
        $situacao->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$situacao->delete();
        return Redirect::to('item/situacao');
    }
}
