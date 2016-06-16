<?php
/**
 * Created by Gabriela Katz
 */
?>
<div id="modal-book-details" class="modal modal-cabecalho fade" tabindex="990" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close ico_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Update Book
            </div>
            <div class="modal-body">
                {!! Form::open(array('name' => 'frm-book', 'id' => 'frm-book', 'url' => route('post.book'), 'method' => 'POST')) !!}
                {!! Form::hidden('book_id', '', ['id' => 'book_id']) !!}
                <div class="row col-md-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 modal-name modal-label">
                                <span for="title" class="table-title">Title:</span>
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::text('title', '', ['id' => 'title', 'class'=>'form-control', 'maxlength' => '45' ]) !!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 modal-label">
                                <span for="editor_id" class="table-title">Editor:</span>
                            </div>
                            <div class="form-group col-sm-6">
                                <select name="editor_id" id="editor_id" class="form-control autocomplete">
                                    <option value=""> Select</option>
                                    @foreach($editors as $editorKey => $editor)
                                        <option value='{!! $editor->id !!}'>
                                            {!! $editor->editor!!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 modal-name modal-label">
                                <span for="year" class="table-title">Year:</span>
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::text('year', '', ['id' => 'year', 'class'=>'form-control', 'maxlength' => '45' ]) !!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-3 modal-edition modal-label">
                                <span for="edition" class="table-title">Edition:</span>
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::text('edition', '', ['id' => 'edition', 'class'=>'form-control', 'maxlength' => '45' ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <div class="col-sm-3 pull-right">
                    <div class="Quadrado_azul_copy">
                        <button id="btn-insert-book" class="btn Quadrado_azul Salvar">Save</button>
                        <button id="btn-update-book" class="btn Quadrado_azul Salvar">Save</button>
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