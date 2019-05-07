@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Items <a href="item/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('item.item.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Tipo</th>
                    <th>Fabricante</th>
                    <th>Modelo</th>
                    <th>Serial</th>
                    <th>Tombo</th>
                    <th>Situação</th>
                    <th>Opções</th>				
				</thead>
               @foreach ($listaItens as $it)
				<tr>
					<td>{{ $it->id}}</td>
                    <td>{{ $it->descricaoTipo}}</td>
					<td>{{ $it->descricaoFabricante}}</td>
                    <td>{{ $it->modelo}}</td>
                    <td>{{ $it->numSerie}}</td>                    
                    <td>{{ $it->numTombo}}</td>
                    @if ($it->descricaoSituacao == "Disponível")
                        <td style="color:green">{{ $it->descricaoSituacao}}</td>
					@else
                        <td>{{ $it->descricaoSituacao}}</td>
                    @endif
					<td>
						<a href="{{URL::action('ItemController@edit',$it->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$it->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('item.item.modal')
				@endforeach
			</table>
		</div>
		{{$listaItens->render()}}
	</div>
</div>
@stop