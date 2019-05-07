<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policial;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PolicialFormRequest;
use DB;

class PolicialController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $policiaisEncontrados = DB::table('policial as pol')
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
                ->where('pol.nomeCompleto', 'LIKE', "%".$query.'%')
                ->where('pol.isActive', 1)
                ->orderBy('pol.idPosto', 'desc')
                ->paginate(7);
            
            return view('policial.index', [
                "listaPoliciais" => $policiaisEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        $postos = DB::table('posto')
                        ->get();        
        return view("policial.create",[
            "postos"=>$postos
        ]);
    }

    public function store(PolicialFormRequest $request){
        $policial = new Policial;
        $policial->matricula = $request->get('matricula');
        $policial->nomeFuncional = $request->get('nomeFuncional');
        $policial->nomeCompleto = $request->get('nomeCompleto');        
        $policial->idPosto = intval($request->get('idPosto'));
        
        $policial->save();

        return Redirect::to('policial');
    }

    public function show($id){
        return view("policial.show", 
            ["policial" => Policial::findOrFail($id)]);
    }

    public function edit($id){

        $policial = Policial::findOrFail($id);
        $postos = DB::table('posto')->get();
        
        return view("policial.edit", 
            [
                "policial" => $policial,
                "postos" => $postos
            ]
        );
    }

    public function update(PolicialFormRequest $request, $id){
        $policial = Policial::findOrFail($id);
                        
        $policial->matricula = $request->get('matricula');
        $policial->nomeFuncional = $request->get('nomeFuncional');
        $policial->nomeCompleto = $request->get('nomeCompleto');        
        $policial->idPosto = intval($request->get('idPosto'));

        $policial->update();
        return Redirect::to('policial');
    }

    public function destroy($id){
        $policial = Policial::findOrFail($id);
        $policial->isActive = 0;
        $policial->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$fabricante->delete();
        return Redirect::to('policial');
    }
}
