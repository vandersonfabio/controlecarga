@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Alocações <a href="alocacao/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('alocacao.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Entrega</th>
					<th>Tipo</th>
					<th>Fabricante</th>
					<th>Modelo</th>
					<th>Tombo</th>
					<th>Setor</th>
                    <th>Opções</th>				
				</thead>
               @foreach ($listaAlocacoes as $aloc)
				<tr>
					<td>{{ $aloc->id}}</td>
					<td>{{ $aloc->dataEntrega}}</td>
					<td>{{ $aloc->tipoItem}}</td>
					<td>{{ $aloc->fabricanteItem}}</td>
					<td>{{ $aloc->modeloItem}}</td>
					<td>{{ $aloc->numTomboItem}}</td>
					<td>{{ $aloc->descricaoSetor}}</td>                    
					<td>						
                        <a href="" data-target="#modal-delete-{{$aloc->id}}" data-toggle="modal"><button class="btn btn-cancel">Dar baixa</button></a>
					</td>
				</tr>
				@include('alocacao.modal')
				@endforeach
			</table>
		</div>
		{{$listaAlocacoes->render()}}
	</div>
</div>
@stop