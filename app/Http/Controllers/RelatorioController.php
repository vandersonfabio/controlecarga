<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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
                ->distinct()
                ->paginate(7);            
            
            return view('relatorio.index', [
                "listaSetores" => $setoresEncontrados                
            ]);
        }
    }

    public function gerarRelatorio($idSetor){

    }
}
