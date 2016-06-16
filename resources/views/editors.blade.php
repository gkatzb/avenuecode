<?php
/**
 * Created by Gabriela Katz
 */
?>
@extends('layouts.default')

@include('includes.modal.modal-editors-details')
@section('content')
	<p class="alert alert-danger hidden"></p>
	<p class="alert alert-success hidden"></p>
	<div class="cabecalho_tabela">
		<span class="header-colaboradores">
			Editors
			<a href="" data-editor-id="" data-name="" data-editor-id="" data-toggle="modal" data-target="#modal-editor-details"><img class="ico_mais" src="/img/ico-add.png" alt=""></a>
		</span>
		<span class="Filtrar pull-right">
			<input type="text" placeholder="Filter..." class="input_Filtrar" />
		</span>
		<hr class="linha_Azul">
	</div>

	<div class="col-sm-12 col-xs-12 table-responsive">
		@include('includes.table.table-editors', $data)
	</div>
	@push('scripts')
		@include('includes.scripts.editor-scripts')
	@endpush
@stop