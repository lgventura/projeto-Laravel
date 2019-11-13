@extends('adm/master')

@section('conteudo')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3><i class="fa fa-plus"> </i>
                    Importar XML:
                  </h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form action="{{url('/adm/xmls/inserir')}}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" >

                      @csrf

                      <input type="hidden"  name="id" value="@isset($dados->id){{$dados->id}}@else{{old('id')}}@endif">

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">XML para importação</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="xml" name="xml" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" />
                                <label for="xml" id="xml" class="btn btn-primary" style="width:50%">Selecione o XML</label>
                                </br>
                                </br>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <input type="text" id="caminho" name="caminho" required="required" class="form-control col-md-7 col-xs-12" value="@isset($dados->titulo){{$dados->titulo}}@else{{old('titulo')}}@endif">
                                </div>
                            </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{url('adm/xmls')}}"><button class="btn btn-warning" type="button">Cancelar</button></a>
						              <button class="btn btn-primary" type="reset">Resetar</button>
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>

  $( "#xml" ).change(function() {
    $('#caminho').val($(this).val());
  });

</script> 	


@endsection