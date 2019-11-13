@extends('adm/master')

@section('conteudo')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detalhes do time - {{$time->nome}}</h3>
              </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="{{url('adm/times/exportDetalhesExcel/'.$time->id)}}" class="btn btn-success btn-xs"><h2><i class="fa fa-file-excel-o"></i> Exportar para Excel</h2> </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <h4>Abreviação: <strong> {{$time->abreviado}} </strong></h4>
                  <h4>Cidade: <strong> {{$time->cidade}} </strong> - <strong> {{$time->uf}} </strong> </h4>
                  <h4>Ano de Fundação: <strong> {{$time->ano_fundacao}} </strong> </h4>

                    <p>Jogadores Vinculados ao Time: {{$time->nome}}</p>

                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Jogador</th>
                          <th style="width: 20%">Numero da Camiseta</th>
                          <th style="width: 40%">Posicao</th>
                                                    
                          <th style="width: 20%">Opções</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($jogadores as $j)
                        
                          <tr>
                            <td> {{ $j->nome }}</td>
                            <td> {{ $j->numero }}</td>
                            <td> {{ $j->posicoes->posicao }}</td>
                                                        
                            <td>
                            <a href="{{url('adm/jogadores/desvincular/'.$j->id)}}" class="btn btn-success btn-xs"> Desvincular Jogador </a>
                            </td>
                          </tr>
                          
                        @endforeach

                      </tbody>
                    </table>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
