@extends('adm/master')

@section('conteudo')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Jogadores Cadastrados</h3>
              </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="{{url('adm/jogadores/cadastrar')}}" class="btn btn-success btn-xs"> <h2>Cadastrar novo Jogador +</h2> </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Comunicados cadastrados</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nome</th>
                          <th style="width: 10%">Numero da Camisa</th>
                          <th style="width: 10%">Posicao</th>
                          <th style="width: 20%">País</th>
                          <th style="width: 10%">Time</th>
                          <th style="width: 30%">Opções</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($jogadores as $j)
                        <tr>
                          <td> {{ $j->nome }}</td>
                          <td> {{ $j->numero }}</td>
                          <td> {{ $j->posicoes->posicao }}</td>
                          <td> {{ $j->pais }}</td>
                          <td> {{ $j->times->nome }}</td>
                          <td>
                          <a href="{{url('adm/jogadores/desvincular/'.$j->id)}}" class="btn btn-success btn-xs"> Desvincular Jogador </a>
                            <a href="{{url('adm/jogadores/dados/'.$j->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="{{url('adm/jogadores/deletar/'.$j->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Excluir </a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    <div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                        <ul class="pagination">
                         {{ $jogadores->links() }}
                        </ul>
                      </div>
                    </div>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection