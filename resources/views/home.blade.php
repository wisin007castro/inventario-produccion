@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection


@section('main-content')
<div class="container spark-screen">

	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<br>
			<div class="panel panel-default">

				<div class="panel-heading">Bienvenido</div>

				<div class="panel-body">
					<!-- {{ trans('adminlte_lang::message.logged') }} -->

					<div class="col-lg-7" style="background-color: #fff;">
						<h1>Phovieda</h1>
						<!-- <h2>Default Blockquote</h2> -->
						<blockquote>
							<p>Primer parrafo.....................................................................
							..............................</p>
						</blockquote>

						<blockquote>
							<p> Segundo parrafo...................................................................
							.................................................</p>
							<small>Autor de la Pagina, <cite title="Source Title">Aqui</cite></small>
						</blockquote>

					</div>

					<div class="col-lg-5" style="background-color: #fff;">
						<img style="width:300px;height:30%;" src="{{url('img/logocasco.png')}}" alt="Photo">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


