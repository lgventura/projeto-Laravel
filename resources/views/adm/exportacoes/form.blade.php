@extends('adm/master')

@section('conteudo')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                @isset($dados)
                  <h3><i class="fa fa-pencil-square-o"> </i>
                    Editar Jogador:
                @else
                  <h3><i class="fa fa-plus"> </i>
                    Cadastrar novo Jogador:
                @endisset </h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form  action="@isset($dados){{url('/adm/jogadores/editar')}}@else{{url('/adm/jogadores/inserir')}}@endif" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      @csrf

                      <input type="hidden"  name="id" value="@isset($dados->id){{$dados->id}}@else{{old('id')}}@endif">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome Completo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->nome){{$dados->nome}}@else{{old('nome')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero"> Número na Camisa <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="0" max="99" id="numero" name="numero" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->numero){{$dados->numero}}@else{{old('numero')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="d_nasc"> Data de Nascimento</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="d_nasc" name="d_nasc" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->d_nasc){{$dados->d_nasc}}@else{{old('paid_nasc')}}@endif">
                          </div>
                        </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pais"> País <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pais" name="pais" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->pais){{$dados->pais}}@else{{old('pais')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="altura"> Altura <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="double" id="altura" name="altura" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->altura){{$dados->altura}}@else{{old('altura')}}@endif">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso"> Peso <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="double" id="peso" name="peso" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->peso){{$dados->peso}}@else{{old('peso')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="posicoes_id"> Posição <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="posicoes_id" name="posicoes_id">
                             @foreach ($posicoes as $p)
                                  <option value="{{$p->id}}">{{$p->posicao}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{url('adm/jogadores')}}"><button class="btn btn-warning" type="button">Cancelar</button></a>
						              <button class="btn btn-primary" type="reset">Resetar</button>
                          <button type="submit" class="btn btn-success">@isset($dados){{"Salvar"}}@else{{"Cadastrar"}}@endif</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>

  $( "#altura" ).keyup(function(e) {
    if(e.key === ','){
      aux = $("#altura").val();
      $("#altura").val(aux.replace(',','.'));
    }
  });

  $( "#peso" ).keyup(function(e) {
    if(e.key === ','){
      aux = $("#peso").val();
      $("#peso").val(aux.replace(',','.'));
    }
  });

</script> 	


@endsection