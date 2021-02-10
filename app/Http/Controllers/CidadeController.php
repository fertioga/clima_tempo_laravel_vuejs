<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\PrevisaoClima;

class CidadeController extends Controller
{
 
    public function getLike($nome){

        $cidades = Cidade::SelectRaw('cidade.id as id,
                                      CONCAT(cidade.nome," - ", estado.uf)  as label')
         ->join('estado','estado.id','=','cidade.estado_id')
        ->Where('cidade.nome','LIKE', $nome.'%')
        ->orderBy('cidade.nome','ASC')
        ->get();

        return $cidades;
    }

    public function getById($id){
       
        //== retora a para os proximos dias
        $previsoes = PrevisaoClima::SelectRaw('previsao_clima.*,
                                               cidade.nome as cidade')
        ->join('cidade','cidade.id','=','previsao_clima.cidade_id')
        ->Where('cidade_id', $id)
        ->where('data_previsao','>=', date('Y-m-d'))
        ->orderBy('data_previsao','ASC')      
        ->limit(7)  
        ->get();

        return $previsoes;

    }

}
