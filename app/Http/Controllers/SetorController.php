<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SetorFormRequest;
use DB;

class SetorController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $setoresEncontrados = DB::table('setor as s')
                ->join('policial as pol', 's.idResponsavel', '=', 'pol.id')
                ->join('posto as p', 'pol.idPosto', '=', 'p.id')
                ->select(
                    's.id',
                    's.descricao',
                    's.isActive',
                    's.idResponsavel',
                    'p.sigla as siglaPostoResponsavel',
                    'pol.nomeFuncional as nomeFuncionalResponsavel'
                )             
                ->where('s.descricao', 'LIKE', "%".$query.'%')
                ->where('s.isActive', 1)
                ->orderBy('s.id', 'desc')
                ->paginate(10);
            
            return view('setor.index', [
                "listaSetores" => $setoresEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        $postos = DB::table('posto')
                        ->get();
        $policiais = DB::table('policial')
                        ->get();
        return view("setor.create",[
            "postos"=>$postos,
            "policiais"=>$policiais
        ]);
    }

    public function store(SetorFormRequest $request){
        $setor = new Setor;
        $setor->descricao = $request->get('descricao');
        $setor->idResponsavel = intval($request->get('idResponsavel'));
        
        $setor->save();

        return Redirect::to('setor');
    }

    public function show($id){
        return view("setor.show", 
            ["setor" => Setor::findOrFail($id)]);
    }

    public function edit($id){

        $setor = Setor::findOrFail($id);
        $postos = DB::table('posto')->get();
        $policiais = DB::table('policial')->get();
        
        return view("setor.edit", 
            [
                "setor" => $setor,
                "postos" => $postos,
                "policiais" => $policiais
            ]
        );
    }

    public function update(SetorFormRequest $request, $id){
        $setor = Setor::findOrFail($id);
                        
        $setor->descricao = $request->get('descricao');
        $setor->idResponsavel = intval($request->get('idResponsavel'));

        $setor->update();
        return Redirect::to('setor');
    }

    public function destroy($id){
        $setor = Setor::findOrFail($id);
        $setor->isActive = 0;
        $setor->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$fabricante->delete();
        return Redirect::to('setor');
    }
}
