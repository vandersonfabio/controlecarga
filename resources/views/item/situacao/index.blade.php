@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Situações <a href="situacao/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('item.situacao.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descrição</th>
                    <th>Opções</th>				
				</thead>
               @foreach ($listaSituacoes as $sit)
				<tr>
					<td>{{ $sit->id }}</td>
					<td>{{ $sit->descricao }}</td>
					<td>
						<a href="{{URL::action('SituacaoController@edit',$sit->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$sit->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('item.situacao.modal')
				@endforeach
			</table>
		</div>
		{{$listaSituacoes->render()}}
	</div>
</div>
@stop