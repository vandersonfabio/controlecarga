<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TipoFormRequest;
use DB;

class TipoController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $tiposEncontrados = DB::table('tipo_item')
                ->where('descricao', 'LIKE', $query.'%')
                ->where('isActive', 1)
                ->orderBy('descricao', 'asc')
                ->paginate(7);
            
            return view('item.tipo.index', [
                "listaTipos" => $tiposEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        return view("item.tipo.create");
    }

    public function store(TipoFormRequest $request){
        $tipo = new Tipo;
        $tipo->descricao = $request->get('descricao');
        $tipo->save();

        return Redirect::to('item/tipo');
    }

    public function show($id){
        return view("item.tipo.show", 
            ["tipo" => Tipo::findOrFail($id)]);
    }

    public function edit($id){
        return view("item.tipo.edit", 
            ["tipo" => Tipo::findOrFail($id)]);
    }

    public function update(TipoFormRequest $request, $id){
        $tipo = Tipo::findOrFail($id);
        $tipo->descricao = $request->get('descricao');
        $tipo->update();
        return Redirect::to('item/tipo');
    }

    public function destroy($id){
        $tipo = Tipo::findOrFail($id);
        $tipo->isActive = 0;
        $tipo->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$tipo->delete();
        return Redirect::to('item/tipo');
    }
}
