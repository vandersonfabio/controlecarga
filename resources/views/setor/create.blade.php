@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Setor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'setor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
                        
			<div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" class="form-control" placeholder="Descrição do setor...">
			</div>
			
			<div class="form-group">
                <label for="idResponsavel">Responsável</label>
				<select class="form-control" name="idResponsavel">
					@foreach ($policiais->all() as $p)
						<option value = "{{ $p->id }}">{{$p->matricula}} - {{$p->siglaPosto}} {{$p->nomeCompleto}} ({{$p->nomeFuncional}})</option>
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