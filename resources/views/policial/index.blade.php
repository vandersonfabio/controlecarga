@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Policiais <a href="policial/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('policial.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Posto</th>
                    <th>Nome Funcional</th>
                    <th>Matrícula</th>					
                    <th>Opções</th>				
				</thead>
               @foreach ($listaPoliciais as $pol)
				<tr>
					<td>{{ $pol->id}}</td>
                    <td>{{ $pol->siglaPosto}}</td>
					<td>{{ $pol->nomeFuncional}}</td>
                    <td>{{ $pol->matricula}}</td>                    
					<td>
						<a href="{{URL::action('PolicialController@edit',$pol->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pol->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('policial.modal')
				@endforeach
			</table>
		</div>
		{{$listaPoliciais->render()}}
	</div>
</div>
@stop