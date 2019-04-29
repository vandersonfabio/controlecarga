@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Policial</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'policial','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            
            <div class="form-group">
                <label for="idPosto">Posto</label>
				<select class="form-control" name="idPosto">
					@foreach ($postos->all() as $p)
						<option value = "{{ $p->id }}">{{$p->descricao}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
            	<label for="matricula">Matrícula</label>
            	<input type="text" name="matricula" class="form-control" placeholder="Matrícula do policial...">
            </div>
            <div class="form-group">
            	<label for="nomeFuncional">Nome Funcional</label>
            	<input type="text" name="nomeFuncional" class="form-control" placeholder="Nome de guerra do policial...">
            </div>
            <div class="form-group">
            	<label for="nomeCompleto">Nome Completo</label>
            	<input type="text" name="nomeCompleto" class="form-control" placeholder="Nome completo do policial...">
            </div>            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop