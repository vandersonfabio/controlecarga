@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Item</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'item/item','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            
            <div class="form-group">
                <label for="idTipo">Tipo</label>
				<select class="form-control" name="idTipo">
					@foreach ($tipos->all() as $t)
						<option value = "{{ $t->id }}">{{$t->descricao}}</option>
					@endforeach
				</select>
            </div>
            <div class="form-group">
                <label for="idFabricante">Fabricante</label>
				<select class="form-control" name="idFabricante">
					@foreach ($fabricantes->all() as $f)
						<option value = "{{ $f->id }}">{{$f->descricao}}</option>
					@endforeach
				</select>
            </div>
            <div class="form-group">
                <label for="idSituacao">Situação</label>
				<select class="form-control" name="idSituacao">
					@foreach ($situacoes->all() as $s)
						<option value = "{{ $s->id }}">{{$s->descricao}}</option>
					@endforeach
				</select>
            </div>                          
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" placeholder="Modelo do item...">
            </div>
            <div class="form-group">
            	<label for="numSerie">Número de série</label>
            	<input type="text" name="numSerie" class="form-control" placeholder="Número de série do item...">
            </div>
            <div class="form-group">
            	<label for="numTombo">Número de tombamento</label>
            	<input type="text" name="numTombo" class="form-control" placeholder="Número de tombamento do item...">
            </div>
            <div class="form-group">
            	<label for="observacoes">Observações</label>
            	<input type="text" name="observacoes" class="form-control" placeholder="Observações sobre o item...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop