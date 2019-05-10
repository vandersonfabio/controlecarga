@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Alocação</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'alocacao','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
                       
						
			<div class="form-group">
                <label for="idItem">Item</label>
				<select class="form-control" name="idItem">
					@foreach ($itens->all() as $i)
						<option value = "{{ $i->id }}">{{$i->numTombo}} - {{$i->descricaoTipo}} {{$i->descricaoFabricante}} {{$i->modelo}} (Serial: {{$i->numSerie}})</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
                <label for="idSetor">Setor</label>
				<select class="form-control" name="idSetor">
					@foreach ($setores->all() as $s)
						<option value = "{{ $s->id }}">{{$s->descricao}}</option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="button" onClick="history.go(-1)">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop