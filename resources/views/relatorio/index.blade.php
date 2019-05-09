@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Setores com Material Alocado		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>					
					<th>Descrição</th>
                    <th>Responsável</th>           
                    <th>Opções</th>				
				</thead>
               @foreach ($listaSetores as $set)
				<tr>					
                    <td>{{ $set->descricao}}</td>
					<td>{{ $set->siglaPostoResponsavel}} {{ $set->nomeFuncionalResponsavel}}</td>                    
					<td>
						<a href="#"><button class="btn btn-info">Gerar Relatório</button></a>                        
					</td>
				</tr>				
				@endforeach
			</table>
		</div>
		{{$listaSetores->render()}}
	</div>
</div>
@stop