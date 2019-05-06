<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Situacao;
use App\Fabricante;
use App\Tipo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ItemFormRequest;
use DB;

class ItemController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $itensEncontrados = DB::table('item as i')
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
                ->where('i.numTombo', 'LIKE', "%".$query.'%')
                ->where('i.isActive', 1)
                ->orderBy('i.id', 'desc')
                ->paginate(10);
            
            return view('item.item.index', [
                "listaItens" => $itensEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        $fabricantes = DB::table('fabricante')
                        ->where('isActive',1)
                        ->get();
        $tipos = DB::table('tipo_item')
                        ->where('isActive',1)
                        ->get();
        $situacoes = DB::table('situacao')
                        ->where('isActive',1)
                        ->get();
        return view("item.item.create",[
            "fabricantes"=>$fabricantes,
            "tipos"=>$tipos,
            "situacoes"=>$situacoes
        ]);
    }

    public function store(ItemFormRequest $request){
        $item = new Item;
        $item->modelo = $request->get('modelo');
        $item->numSerie = $request->get('numSerie') ? $request->get('numSerie') : 'Não informado';
        $item->numTombo = $request->get('numTombo') ? $request->get('numTombo') : 'Não informado';
        $item->observacoes = $request->get('observacoes') ? $request->get('observacoes') : 'Sem observações';
        $item->idTipo = intval($request->get('idTipo'));
        $item->idFabricante = intval($request->get('idFabricante'));
        $item->idSituacao = intval($request->get('idSituacao'));
        
        $item->save();

        return Redirect::to('item/item');
    }

    public function show($id){
        return view("item.item.show", 
            ["item" => Item::findOrFail($id)]);
    }

    public function edit($id){

        $item = Item::findOrFail($id);
        $fabricantes = DB::table('fabricante')->where('isActive',1)->get();
        $tipos = DB::table('tipo_item')->where('isActive',1)->get();
        $situacoes = DB::table('situacao')->where('isActive',1)->get();

        return view("item.item.edit", 
            [
                "item" => $item,
                "fabricantes" => $fabricantes,
                "tipos" => $tipos,
                "situacoes" => $situacoes
            ]
        );
    }

    public function update(ItemFormRequest $request, $id){
        $item = Item::findOrFail($id);
        
        $item->modelo = $request->get('modelo');
        
        $item->numSerie = $request->get('numSerie') ? $request->get('numSerie') : 'Não informado';
        $item->numTombo = $request->get('numTombo') ? $request->get('numTombo') : 'Não informado';
        $item->observacoes = $request->get('observacoes') ? $request->get('observacoes') : 'Sem observações';
        $item->idTipo = intval($request->get('idTipo'));
        $item->idFabricante = intval($request->get('idFabricante'));
        $item->idSituacao = intval($request->get('idSituacao'));

        $item->update();
        return Redirect::to('item/item');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->isActive = 0;
        $item->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$fabricante->delete();
        return Redirect::to('item/item');
    }

    public function alocar($id){        
        $affected = DB::update('update item set idSituacao = 2 where id = ?', [$id]);
    }


    public function desalocar($id){        
        $affected = DB::update('update item set idSituacao = 1 where id = ?', [$id]);        
    }
}
