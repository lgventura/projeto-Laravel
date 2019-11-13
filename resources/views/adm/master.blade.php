<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel - Projeto</title>

    <!-- Bootstrap -->
    <link href="/adm/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/adm/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/adm/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/adm/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="/adm/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/adm/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/adm/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/adm/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/adm/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/adm/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="/adm/multiple/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">

    <!-- Custom Theme Style -->
    <link href="/adm/build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Projeto - Desafio</span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('adm/times')}}"><i class="fa fa-home"></i> Times <span class="fa"></span></a></li>
                  <li><a href="{{url('adm/jogadores')}}"><i class="fa fa-male"></i> Jogadores <span class="fa"></span></a></li>
                  <li><a href="{{url('adm/xmls')}}"><i class="fa fa-file-code-o"></i> XMLs <span class="fa"></span></a></li>
                  <li><a href="{{url('adm/exportacoes')}}"><i class="fa fa-file-archive-o"></i> Download Exportações <span class="fa"></span></a></li>
                </
                </ul>
              </div>
            </div>

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            </nav>
          </div>
        </div>
        <!-- Conteudo -->
        @yield('conteudo')
      <!-- footer content -->
        <footer>
          @if (session('erro'))
            <div class="pull-right">
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: green"><span aria-hidden="true">X</span>
                  </button>
                  <strong>{{ session('erro') }}</strong>
                </div>
            </div>

            @elseif (session('certo'))

              <div class="pull-right">
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: red"><span aria-hidden="true">X</span>
                    </button>
                    <strong>{{session('certo')}}</strong>
                  </div>
            </div>
          @endif
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

     <!-- jQuery -->
    <script src="/adm/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/adm/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/adm/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/adm/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/adm/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/adm/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/adm/vendors/moment/min/moment.min.js"></script>
    <script src="/adm/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="/adm/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="/adm/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="/adm/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="/adm/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="/adm/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="/adm/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="/adm/vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="/adm/vendors/parsleyjs/dist/i18n/pt-br.js"></script>
    <!-- Autosize -->
    <script src="/adm/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/adm/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="/adm/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/adm/build/js/custom.min.js"></script>

  </body>
</html>
