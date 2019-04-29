@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Setores <a href="setor/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('setor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descrição</th>
                    <th>Responsável</th>                    
                    <th>Opções</th>				
				</thead>
               @foreach ($listaSetores as $set)
				<tr>
					<td>{{ $set->id}}</td>
                    <td>{{ $set->descricao}}</td>
					<td>{{ $set->siglaPostoResponsavel}} {{ $set->nomeFuncionalResponsavel}}</td>                    
					<td>
						<a href="{{URL::action('SetorController@edit',$set->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$set->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('setor.modal')
				@endforeach
			</table>
		</div>
		{{$listaSetores->render()}}
	</div>
</div>
@stop