@extends('layouts.app')

@section('content')
<header style="margin:0 0 20px 0; padding:20px 0" class="bg-info text-white  container-fluid">
    <div class="row justify-content-center">
        <h1>Clima Tempo - Simples</h1>
    </div>   
</header>
<main>
    <div class="container">
        <div class="row justify-content-center">     

            <div class="col-md-6">                
                <card
                    header='Cidades mais quentes hoje <i class="fa fa-sun-o fa-2x float-right text-warning font-weight-bold " aria-hidden="true"></i>'
                    >
                        <table class="table">
                            <tbody>
                                @foreach($cidadesQuentes as $cidadeQ)
                                    <tr>
                                        <td>{{$cidadeQ->cidade}}</td>
                                        <td align=right>{{$cidadeQ->temperatura_maxima	}} °C</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </card>
            </div>
            <div class="col-md-6">
                <card
                    header='Cidades mais frias hoje <i class="fa fa-snowflake-o fa-2x float-right text-info font-weight-bold " aria-hidden="true"></i>'
                     >
                        <table class="table">
                            <tbody>
                                @foreach($cidadesFrias as $cidadeF)
                                    <tr>
                                        <td>{{$cidadeF->cidade}}</td>
                                        <td align=right>{{$cidadeF->temperatura_minima	}} °C</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </card>
            </div>

        </div>
        
        
        <select-cidade
            patch_img = "{{ asset('img/') }}"
        />    
        
    </div>
</main>
@endsection