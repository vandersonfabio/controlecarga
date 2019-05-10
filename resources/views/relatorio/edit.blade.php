<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $setor->descricao }} - Itens alocados - <?php echo date("Y/m/d"); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <style>
        div.toplinetext {
            -webkit-text-decoration-line: overline; /* Safari */
            text-decoration-line: overline; 
            text-align:center;
        }
        div.nolinetext {
            text-align:center;
        }
    </style>

  </head>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="row">
        <div style="text-align:center">
            <h3> <b> {{ $setor->descricao }} </b> </h3>
            <h5>Lista de material carga alocado no setor</h5>
            <hr>	
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>					
                        <th>Nº Tombo</th>
                        <th>Entrega</th>
                        <th>Descriminação</th>
                        <th>Nº Série</th>					
                        <th>Observações</th>					
                    </thead>
                    @foreach ($listaAlocacoes as $aloc)
                    <tr>
                        <td>{{ $aloc->numTomboItem}}</td>
                        <td>{{ $aloc->dataEntrega}}</td>
                        <td>{{ $aloc->tipoItem}} {{ $aloc->fabricanteItem}} - Modelo {{ $aloc->modeloItem}}</td>
                        <td>{{ $aloc->numTomboItem}}</td>
                        <td>{{ $aloc->obsItem}}</td>					
                    </tr>				
                    @endforeach
                </table>
            </div>
            {{$listaAlocacoes->render()}}
        </div>
    </div>

    <hr>

    <div class="row">
        <div style="text-align:center">
            <h5> Conferido em <b><?php echo date("d/m/Y"); ?></b></h5> <br>       
        </div>
    </div>

    <div class="row">
        <div class="toplinetext">            
            <h5><b> {{ $responsavel->nomeCompleto }} </b> - Matrícula: {{ $responsavel->matricula }}</h5>            
        </div>
        <div class="nolinetext">            
            <h5> Responsável pelo setor </h5>
        </div>
    </div>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>