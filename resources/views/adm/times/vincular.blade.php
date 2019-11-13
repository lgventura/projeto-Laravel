@extends('adm/master')

@section('conteudo')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                 <h3><i class="fa fa-plus"> </i>
                    Vincular Jogadores ao Time:
                </h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form  onclick="desabilitar()" action="{{url('/adm/times/jogadores')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      @csrf

                      <input type="hidden"  name="id" value="{{$dados->id}}">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecione os Jogadores</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="selJogador" onchange="selecionado()" class="form-control col-md-7 col-xs-12">
                              <option selected disabled>Selecionar Jogador</option>
                            @foreach($jogadores as $j)
                                <option value="{{$j->nome}}" >{{$j->nome}}</option>
                            @endforeach

                          </select>
                        </div>
                      </div>

                      <script type="text/javascript">

                        function desabilitar() {
                          document.getElementById("tags_1_tag").setAttribute("disabled", "");
                        }

                        function selecionado() {
                          var e = new $.Event('keypress');
                          var valor = document.getElementById("selJogador").value;
                          document.getElementById("tags_1_tag").value = valor;
                          document.getElementById("tags_1_tag").focus();
                          e.which = 13;
                          $("#tags_1_tag").trigger(e);

                        }
                      </script>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecionados</label>
                        <div class="form-group col-md-6 col-xs-12">
                          <input id="tags_1" type="text" name="jogadores" class="tags form-control" value="" />
                        </div>
                      </div>                          
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{url('adm/times')}}"><button class="btn btn-warning" type="button">Cancelar</button></a>
						              <button class="btn btn-primary" type="reset">Resetar</button>
                          <button type="submit" class="btn btn-success">@isset($dados){{"Salvar"}}@else{{"Cadastrar"}}@endif</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

@endsection
