@extends('adm/master')

@section('conteudo')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                @isset($dados)
                  <h3><i class="fa fa-pencil-square-o"> </i>
                    Editar Time:
                @else
                  <h3><i class="fa fa-plus"> </i>
                    Adicionar novo Time:
                @endisset </h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form  onclick="desabilitar()" action="@isset($dados){{url('/adm/times/editar')}}@else{{url('/adm/times/inserir')}}@endif" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      @csrf

                      <input type="hidden"  name="id" value="@isset($dados->id){{$dados->id}}@else{{old('id')}}@endif">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->nome){{$dados->nome}}@else{{old('nome')}}@endif">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviado"> Abreviação <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="abreviado" name="abreviado" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->abreviado){{$dados->abreviado}}@else{{old('abreviado')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cidade"> Cidade <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cidade" name="cidade" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->cidade){{$dados->cidade}}@else{{old('cidade')}}@endif">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uf"> UF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="uf" name="uf">
                            <option @isset($dados->uf) @if($dados->uf=="AC") selected @endif @endif value="AC">Acre</option>
                            <option @isset($dados->uf) @if($dados->uf=="AL") selected @endif @endif value="AL">Alagoas</option>
                            <option @isset($dados->uf) @if($dados->uf=="AP") selected @endif @endif value="AP">Amapá</option>
                            <option @isset($dados->uf) @if($dados->uf=="AM") selected @endif @endif value="AM">Amazonas</option>
                            <option @isset($dados->uf) @if($dados->uf=="BA") selected @endif @endif value="BA">Bahia</option>
                            <option @isset($dados->uf) @if($dados->uf=="CE") selected @endif @endif value="CE">Ceará</option>
                            <option @isset($dados->uf) @if($dados->uf=="DF") selected @endif @endif value="DF">Distrito Federal</option>
                            <option @isset($dados->uf) @if($dados->uf=="ES") selected @endif @endif value="ES">Espírito Santo</option>
                            <option @isset($dados->uf) @if($dados->uf=="GO") selected @endif @endif value="GO">Goiás</option>
                            <option @isset($dados->uf) @if($dados->uf=="MA") selected @endif @endif value="MA">Maranhão</option>
                            <option @isset($dados->uf) @if($dados->uf=="MT") selected @endif @endif value="MT">Mato Grosso</option>
                            <option @isset($dados->uf) @if($dados->uf=="MS") selected @endif @endif value="MS">Mato Grosso do Sul</option>
                            <option @isset($dados->uf) @if($dados->uf=="MG") selected @endif @endif value="MG">Minas Gerais</option>
                            <option @isset($dados->uf) @if($dados->uf=="PA") selected @endif @endif value="PA">Pará</option>
                            <option @isset($dados->uf) @if($dados->uf=="PB") selected @endif @endif value="PB">Paraíba</option>
                            <option @isset($dados->uf) @if($dados->uf=="PR") selected @endif @endif value="PR">Paraná</option>
                            <option @isset($dados->uf) @if($dados->uf=="PE") selected @endif @endif value="PE">Pernambuco</option>
                            <option @isset($dados->uf) @if($dados->uf=="PI") selected @endif @endif value="PI">Piauí</option>
                            <option @isset($dados->uf) @if($dados->uf=="RJ") selected @endif @endif value="RJ">Rio de Janeiro</option>
                            <option @isset($dados->uf) @if($dados->uf=="RN") selected @endif @endif value="RN">Rio Grande do Norte</option>
                            <option @isset($dados->uf) @if($dados->uf=="RS") selected @endif @endif value="RS">Rio Grande do Sul</option>
                            <option @isset($dados->uf) @if($dados->uf=="RO") selected @endif @endif value="RO">Rondônia</option>
                            <option @isset($dados->uf) @if($dados->uf=="RR") selected @endif @endif value="RR">Roraima</option>
                            <option @isset($dados->uf) @if($dados->uf=="SC") selected @endif @endif value="SC">Santa Catarina</option>
                            <option @isset($dados->uf) @if($dados->uf=="SP") selected @endif @endif value="SP">São Paulo</option>
                            <option @isset($dados->uf) @if($dados->uf=="SE") selected @endif @endif value="SE">Sergipe</option>
                            <option @isset($dados->uf) @if($dados->uf=="TO") selected @endif @endif value="TO">Tocantins</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano_fundacao"> Ano de Fundação do Time <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="1863" max="2020" id="ano_fundacao" name="ano_fundacao" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->ano_fundacao){{$dados->ano_fundacao}}@else{{old('ano_fundacao')}}@endif">
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


        <!-- /page content -->
@endsection
