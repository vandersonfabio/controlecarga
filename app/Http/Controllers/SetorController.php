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
                ->orderBy('s.descricao', 'asc')
                ->paginate(7);
            
            return view('setor.index', [
                "listaSetores" => $setoresEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){        
        $policiais = DB::table('policial as pol')
                        ->join('posto as p', 'pol.idPosto', '=', 'p.id')                
                        ->select(
                            'pol.id',
                            'pol.matricula',
                            'pol.nomeFuncional',
                            'pol.nomeCompleto',
                            'pol.isActive',
                            'pol.idPosto',                    
                            'p.descricao as descricaoPosto',
                            'p.sigla as siglaPosto'
                        )                        
                        ->where('pol.isActive', 1)
                        ->orderBy('pol.idPosto', 'desc')
                        ->orderBy('pol.nomeCompleto', 'asc')
                        ->get();
        return view("setor.create",[
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
        
        $policiais = DB::table('policial as pol')
                ->join('posto as p', 'pol.idPosto', '=', 'p.id')                
                ->select(
                    'pol.id',
                    'pol.matricula',
                    'pol.nomeFuncional',
                    'pol.nomeCompleto',
                    'pol.isActive',
                    'pol.idPosto',                    
                    'p.descricao as descricaoPosto',
                    'p.sigla as siglaPosto'
                )                        
                ->where('pol.isActive', 1)
                ->orderBy('pol.idPosto', 'desc')
                ->orderBy('pol.nomeCompleto', 'asc')
                ->get();
        
        return view("setor.edit", 
            [
                "setor" => $setor,                
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
