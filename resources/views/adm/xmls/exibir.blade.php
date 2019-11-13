@extends('adm/master')

@section('conteudo')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>XMLS</h3>
              </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="{{url('adm/xmls/importar')}}" class="btn btn-success btn-xs"> <h2>Importar XML +</h2> </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="{{url('adm/xmls/downloadSelectedXmls')}}" method="post" data-parsley-validate id="form">
                    @csrf
                    <p>XMLS Importados</p>

                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 10%">Selecionar</th>
                          <th style="width: 10%">ID</th>
                          <th style="width: 50%">XML</th>
                          <th style="width: 30%">Opções</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($xmls as $x)
                        <tr>
                          <td><input type="checkbox" name="download[]" class="dowload"  class="form-control" value="{{ $x->id }}"></td>
                          <td> {{ $x->id }}</td>
                          <td> {{ $x->nome }}</td>
                          <td>
                            <a href="{{url('adm/xmls/downloadxml/'.$x->id)}}" class="btn btn-success btn-xs"> Download XML </a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    <div class="x_title">
                     <button type="submit" class="btn btn-primary btn-md"> <h4>Download dos XMLS Selecionados</h4> </button>
                    </div>  
                    </form>
                    
                    <div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                        <ul class="pagination">
                         {{ $xmls->links() }}
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<script src="/adm/vendors/jquery/dist/jquery.min.js"></script>
<script>
    $(document).on('click', '#btn_download', function(){
      data =  $("#form").serialize();
      console.log(data)
      $.ajax({
          url: "{{url('adm/xmls/downloadSelectedXmls')}}",
          type:'POST',
          async:false, 
          data:data,
          success: function(response) {              
            alert("OK ao realizar download")
            console.log(response)
          },
          error: function(data) { 
              alert("Erro ao realizar download")
          }
        });
	   	
	
   	});
    	
</script> 
        
@endsection