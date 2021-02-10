<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\PrevisaoClima;

class ClimaController extends Controller
{
    public function index(){

        $cidadesQuentes = PrevisaoClima::SelectRaw('previsao_clima.*,
                                                    CONCAT(cidade.nome," - ", estado.uf)  as cidade')
                            ->join('cidade','cidade.id','=','previsao_clima.cidade_id')
                            ->join('estado','estado.id','=','cidade.estado_id')
                            ->where('previsao_clima.data_previsao', date('Y-m-d'))
                            ->orderBy('previsao_clima.temperatura_maxima','DESC') 
                            ->orderBy('cidade.nome','ASC') 
                            ->orderBy('estado.uf','ASC')      
                            ->limit(3)  
                            ->get();

        $cidadesFrias = PrevisaoClima::SelectRaw('previsao_clima.*,
                                                  CONCAT(cidade.nome," - ", estado.uf)  as cidade')
                            ->join('cidade','cidade.id','=','previsao_clima.cidade_id')
                            ->join('estado','estado.id','=','cidade.estado_id')
                            ->where('previsao_clima.data_previsao', date('Y-m-d'))
                            ->orderBy('previsao_clima.temperatura_minima','ASC')
                            ->orderBy('cidade.nome','ASC') 
                            ->orderBy('estado.uf','ASC')        
                            ->limit(3)  
                            ->get();

        return view('Clima.index', compact('cidadesQuentes','cidadesFrias'));

    }
}
