<?php
/**
 * Created by Gabriela Katz
 */
?>
<div class="editors-table">
    <table id="editor-table" class="table table-hover">
        <thead>
        <tr class="table-title">
            <th class="Nome">Name</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data))
            @foreach($data as $editorKey => $editor)
                <tr>
                    <td>
                        <a class="Nomes" class="label btn btn-next" data-toggle="modal" data-target="#modal-editor-details"
                           data-editor-id="{!! $editor->id !!}" data-name="{!! $editor->name !!}" !!}>
                            {!! $editor->name !!}
                        </a>
                        <a class="btn label btn-prev btn-delete-editor pull-right" data-token="{!! csrf_token() !!}" data-editor-id="{!! $editor->id !!}">
                            <img class="ico_delete ico_delete_empresa" src="/img/ico-del.png" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="Nomes">
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>