<?php
/**
 * Created by Gabriela Katz
 */
?>
<div id="modal-editor-details" class="modal modal-cabecalho fade" tabindex="990" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-editor">
            <div class="modal-header">
                <button type="button" class="close ico_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Update Editor
            </div>
            <div class="modal-body modal-body-editor">
                {!! Form::open(array('name' => 'frm-editor', 'id' => 'frm-editor', 'url' => route('post.editor'), 'method' => 'POST')) !!}
                {!! Form::hidden('editor_id', '', ['id' => 'editor_id']) !!}
                <div class="row col-md-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 modal-name modal-label">
                                <span for="name" class="table-title">Name:</span>
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::text('name', '', ['id' => 'name', 'class'=>'form-control', 'maxlength' => '45' ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <div class="col-sm-3 pull-right">
                    <div class="Quadrado_azul_copy">
                        <button id="btn-insert-editor" class="btn Quadrado_azul Salvar">Save</button>
                        <button id="btn-update-editor" class="btn Quadrado_azul Salvar">Save</button>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                    <div class="Quadrado_cinza_copy">
                        <button id="button" class="btn Quadrado_cinza Cancelar" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>