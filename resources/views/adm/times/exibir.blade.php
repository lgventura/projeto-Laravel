@extends('adm/master')

@section('conteudo')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Times</h3>
              </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a style="float:left" href="{{url('adm/times/cadastrar')}}" class="btn btn-success btn-xs"> <h2>Cadastrar novo time +</h2> </a>
                    <a style="float:right" href="{{url('adm/times/export')}}" class="btn btn-primary btn-md"><h2><i class="fa fa-file-excel-o"></i> Exportar para Excel</h2> </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Times cadastrados</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nome</th>
                          <th style="width: 10%">Abreviação</th>
                          <th style="width: 20%">Cidade</th>
                          <th>UF</th>
                          
                          <th style="width: 40%">Opções</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($times as $t)
                        
                          @if($t->id != 1)
                          <tr>
                            <td> {{ $t->nome }}</td>
                            <td> {{ $t->abreviado }}</td>
                            <td> {{ $t->cidade }}</td>
                            <td> {{ $t->uf }}</td>
                            
                            <td>
                            <a href="{{url('adm/times/vincular/'.$t->id)}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Vincular Jogador </a>
                              <a href="{{url('adm/times/detalhes/'.$t->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Visualizar </a>
                              <a href="{{url('adm/times/dados/'.$t->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                              <a href="{{url('adm/times/deletar/'.$t->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Excluir </a>
                            </td>
                          </tr>
                          @endif
                          
                        @endforeach

                      </tbody>
                    </table>
                      
                    <div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                        <ul class="pagination">
                         {{ $times->links() }}
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
